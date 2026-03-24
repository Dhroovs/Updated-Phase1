<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fffdf0; font-family: 'Segoe UI', sans-serif; margin: 0; }
        .topbar { background: #1a1a2e; padding: 14px 28px; display: flex; justify-content: space-between; align-items: center; }
        .topbar .brand { color: #fff; font-size: 18px; font-weight: 700; letter-spacing: 1px; text-decoration: none; }
        .topbar .nav-links a { color: #ccc; text-decoration: none; margin-left: 20px; font-size: 13px; }
        .topbar .nav-links a:hover { color: #fff; }
        .logout-btn { background: transparent; border: 1px solid #e94560; color: #e94560; padding: 5px 16px; border-radius: 5px; font-size: 13px; cursor: pointer; margin-left: 20px; }
        .logout-btn:hover { background: #e94560; color: #fff; }
        .main-content { max-width: 1100px; margin: 30px auto; padding: 0 20px; }
        .card-box { background: #fff; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 28px; margin-bottom: 20px; }
        .page-heading { font-size: 20px; font-weight: 700; color: #1a1a2e; margin-bottom: 20px; }
        .btn-dark-custom { background: #1a1a2e; color: #fff; border: none; padding: 9px 22px; border-radius: 6px; font-size: 14px; cursor: pointer; }
        .btn-dark-custom:hover { background: #e94560; color: #fff; }
        .alert { border-radius: 6px; font-size: 14px; }
    </style>
</head>
<body>

@if(session('user_id'))
<div class="topbar">
    <a href="/dashboard" class="brand">MyApp</a>
    <div class="nav-links d-flex align-items-center">
        <a href="/dashboard">Dashboard</a>
        <a href="/records">Records</a>
        <form method="POST" action="/logout" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
@endif

<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>