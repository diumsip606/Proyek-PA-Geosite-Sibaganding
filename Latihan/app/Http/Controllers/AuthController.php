<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Tambahan untuk DB
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str; // Tambahan untuk String random
use Carbon\Carbon; // Tambahan untuk waktu


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // --- FITUR LUPA PASSWORD ---

    /**
     * Menampilkan halaman input email untuk reset password
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    /**
     * Memproses permintaan link reset password
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Cek apakah user ada di database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Buat token reset
        $token = Str::random(64);

        // Simpan ke tabel password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        // Menulis Link ke Log (karena MAIL_MAILER=log di .env)
        // Kamu bisa cek link-nya di: storage/logs/laravel.log
        \Log::info("Link Reset Password ({$request->email}): " . url("/reset-password/{$token}?email=" . urlencode($request->email)));

        return back()->with('status', 'Link reset password sudah dikirim! Silakan cek log sistem (storage/logs/laravel.log).');
    }

    // RESET PASSWORD
    public function showResetPasswordForm(Request $request, $token)
    {
        // Mengarahkan ke file resources/views/auth/reset_password.blade.php
        return view('auth.reset_password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // VALIDASI UNTUK RESET PASSWORD
    public function resetPassword(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // 2. Cek apakah token valid di tabel password_reset_tokens
        $resetData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetData) {
            return back()->withErrors(['email' => 'Token reset password tidak valid atau sudah kedaluwarsa.']);
        }

        // 3. Update Password User
        DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now(),
        ]);

        // 4. Hapus token agar tidak bisa dipakai lagi
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // 5. Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Password berhasil diperbarui! Silakan login dengan password baru.');
    }
}