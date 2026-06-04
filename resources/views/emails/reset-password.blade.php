<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password - Geosite Sibaganding</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f7f6;
            padding: 20px 0;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        .email-header {
            background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
            padding: 30px;
            text-align: center;
            color: #ffffff;
        }
        .email-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .email-body {
            padding: 40px 30px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body p {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .btn-container {
            text-align: center;
            margin: 30px 0;
        }
        .btn-reset {
            display: inline-block;
            background-color: #c6a43b;
            color: #003366 !important;
            text-decoration: none;
            padding: 14px 30px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(198, 164, 59, 0.2);
            transition: background-color 0.2s;
        }
        .btn-reset:hover {
            background-color: #b09030;
        }
        .email-footer {
            background-color: #f8fafc;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            border-top: 1px solid #edf2f7;
        }
        .email-footer p {
            margin: 5px 0;
        }
        .warning-text {
            font-size: 14px;
            color: #718096;
            background-color: #f7fafc;
            border-left: 4px solid #cbd5e0;
            padding: 15px;
            margin-top: 25px;
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h2>🔄 Reset Password Akun</h2>
            </div>
            <div class="email-body">
                <p>Halo,</p>
                <p>Anda menerima email ini karena kami menerima permintaan untuk mereset password akun Anda di portal admin <strong>Geosite Sibaganding</strong>.</p>
                
                <div style="text-align: center; margin: 30px 0;">
                    <div style="display: inline-block; background-color: #f7fafc; border: 2px dashed #c6a43b; border-radius: 12px; padding: 20px 40px;">
                        <span style="font-size: 36px; font-weight: bold; letter-spacing: 6px; color: #003366;">{{ $otp }}</span>
                    </div>
                    <p style="margin-top: 15px; font-size: 14px; color: #718096; margin-bottom: 0;">Masukkan kode OTP di atas pada halaman Lupa Password untuk mereset password Anda.</p>
                </div>

                <p>Kode OTP ini <strong>hanya berlaku selama 15 menit</strong>. Setelah itu, Anda harus melakukan permintaan ulang.</p>
                
                <div class="warning-text">
                    Jika Anda tidak merasa melakukan permintaan ini, tidak ada tindakan lanjutan yang perlu diambil. Password Anda tetap aman.
                </div>
            </div>
            <div class="email-footer">
                <p>&copy; {{ date('Y') }} Geosite Sibaganding. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
