<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .register-wrap { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 30px 0; }
        .register-box { background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); padding: 40px; width: 100%; max-width: 460px; }
        .register-title { font-size: 26px; font-weight: 700; color: #1a1a2e; margin-bottom: 6px; }
        .register-sub { font-size: 13px; color: #888; margin-bottom: 24px; }
        .form-label { font-size: 13px; font-weight: 600; color: #444; }
        .form-control { border-radius: 6px; font-size: 14px; padding: 10px 14px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #1a1a2e; box-shadow: none; }
        .btn-register { background: #1a1a2e; color: #fff; width: 100%; padding: 11px; border-radius: 6px; font-size: 15px; font-weight: 600; border: none; margin-top: 8px; }
        .btn-register:hover { background: #e94560; }
        .bottom-link { text-align: center; margin-top: 16px; font-size: 13px; color: #888; }
        .bottom-link a { color: #e94560; text-decoration: none; font-weight: 600; }
        .error-text { font-size: 12px; color: #e94560; margin-top: 4px; }
    </style>
</head>
<body>
<div class="register-wrap">
    <div class="register-box">
        <div class="register-title">Create account</div>
        <div class="register-sub">Fill in the details below to get started</div>

        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="John Doe">
                @error('name') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com">
                @error('email') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="eg. 9876543210">
                @error('phone') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimum 6 characters">
                @error('password') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat your password">
            </div>

            <button type="submit" class="btn-register">Create Account</button>
        </form>

        <div class="bottom-link">
            Already have an account? <a href="/login">Login here</a>
        </div>
    </div>
</div>
</body>
</html>