<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .login-wrap { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-box { background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); padding: 40px; width: 100%; max-width: 420px; }
        .login-title { font-size: 26px; font-weight: 700; color: #1a1a2e; margin-bottom: 6px; }
        .login-sub { font-size: 13px; color: #888; margin-bottom: 24px; }
        .form-label { font-size: 13px; font-weight: 600; color: #444; }
        .form-control { border-radius: 6px; font-size: 14px; padding: 10px 14px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #1a1a2e; box-shadow: none; }
        .btn-login { background: #1a1a2e; color: #fff; width: 100%; padding: 11px; border-radius: 6px; font-size: 15px; font-weight: 600; border: none; margin-top: 8px; }
        .btn-login:hover { background: #e94560; }
        .bottom-link { text-align: center; margin-top: 16px; font-size: 13px; color: #888; }
        .bottom-link a { color: #e94560; text-decoration: none; font-weight: 600; }
        .error-text { font-size: 12px; color: #e94560; margin-top: 4px; }
        .alert { border-radius: 6px; font-size: 13px; margin-bottom: 16px; }
    </style>
</head>
<body>
<div class="login-wrap">
    <div class="login-box">
        <div class="login-title">Welcome back</div>
        <div class="login-sub">Login to your account to continue</div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com">
                @error('email') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                @error('password') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="bottom-link">
            Don't have an account? <a href="/register">Register here</a>
        </div>
    </div>
</div>
</body>
</html>