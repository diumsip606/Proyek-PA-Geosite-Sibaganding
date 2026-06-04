<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Tampilkan form lupa password
    public function showForgotForm(Request $request)
    {
        if ($request->query('clear')) {
            session()->forget(['otp_sent', 'otp_verified', 'reset_email']);
            return redirect()->route('password.request');
        }
        return view('auth.forgot-password');
    }

    // Kirim kode OTP ke EMAIL
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Generate 6-digit OTP
        $otp = rand(100000, 999999);
        
        // Hapus token/OTP lama jika ada
        DB::table('password_resets')->where('email', $request->email)->delete();
        
        // Simpan OTP baru
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $otp,
            'created_at' => Carbon::now()
        ]);
        
        // Kirim email
        try {
            Mail::to($request->email)->send(new ResetPasswordMail($otp, $request->email));
            
            // Simpan status pengiriman OTP ke session secara persisten
            session([
                'otp_sent' => true,
                'reset_email' => $request->email
            ]);
            
            return back()->with('success', 'Kode OTP reset password telah dikirim ke ' . $request->email . '. Silakan cek inbox atau folder spam Anda.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email. Error: ' . $e->getMessage()]);
        }
    }

    // Proses verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'otp' => 'required|numeric|digits:6',
        ]);

        $resetData = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();

        if (!$resetData) {
            return back()->withErrors(['otp' => 'Kode OTP tidak valid.'])->withInput();
        }

        $createdAt = Carbon::parse($resetData->created_at);
        if (Carbon::now()->diffInMinutes($createdAt) > 15) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return back()->withErrors(['otp' => 'Kode OTP sudah kadaluarsa. Silakan request ulang.'])->withInput();
        }

        // Set status verifikasi OTP ke session secara persisten
        session(['otp_verified' => true]);

        return back()->with('success', 'Kode OTP berhasil diverifikasi. Silakan masukkan password baru Anda.');
    }

    // Proses reset password setelah verifikasi OTP sukses
    public function resetPassword(Request $request)
    {
        if (!session('otp_verified') || session('reset_email') !== $request->email) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Sesi verifikasi Anda tidak valid. Silakan mulai ulang.']);
        }

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        // Hapus session state
        session()->forget(['otp_sent', 'otp_verified', 'reset_email']);

        return redirect()->route('login')
            ->with('success', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }
}