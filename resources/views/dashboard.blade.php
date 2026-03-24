@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">

    {{-- Profile Card --}}
    <div class="col-md-4">
        <div class="card-box text-center">
            <div style="width:80px;height:80px;border-radius:50%;background:#1a1a2e;color:#fff;font-size:28px;font-weight:700;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div style="font-size:18px;font-weight:700;color:#1a1a2e;">{{ $user->name }}</div>
            <div style="font-size:13px;color:#888;margin-top:4px;">{{ $user->email }}</div>
            <div style="font-size:13px;color:#888;margin-top:2px;">📞 {{ $user->phone }}</div>
            <hr style="margin:16px 0;">
            <a href="/records" class="btn-dark-custom d-inline-block" style="text-decoration:none;border-radius:6px;">
                View All Records
            </a>
        </div>
    </div>

    {{-- Update Profile Form --}}
    <div class="col-md-8">
        <div class="card-box">
            <div class="page-heading">Update Profile</div>

            <form method="POST" action="/dashboard/update">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label style="font-size:13px;font-weight:600;">Full Name</label>
                        <input type="text" name="name" class="form-control mt-1" value="{{ $user->name }}">
                        @error('name') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label style="font-size:13px;font-weight:600;">Email Address</label>
                        <input type="email" name="email" class="form-control mt-1" value="{{ $user->email }}">
                        @error('email') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label style="font-size:13px;font-weight:600;">Phone Number</label>
                        <input type="text" name="phone" class="form-control mt-1" value="{{ $user->phone }}">
                        @error('phone') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label style="font-size:13px;font-weight:600;">New Password <span style="color:#aaa;font-weight:400;">(leave blank to keep)</span></label>
                        <input type="password" name="password" class="form-control mt-1">
                        @error('password') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label style="font-size:13px;font-weight:600;">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control mt-1">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-dark-custom">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection