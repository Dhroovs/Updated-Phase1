@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-custom">
            <div class="page-title">Add New Record</div>

            <form method="POST" action="/records" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="eg. John Doe">
                        @error('full_name') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="eg. john@email.com">
                        @error('email') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="eg. 9876543210">
                        @error('phone') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                        @error('date_of_birth') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Images <span style="color:#aaa;font-weight:400;">(max 5)</span></label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                        @error('images') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold" style="font-size:13px;">Address</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Enter full address">{{ old('address') }}</textarea>
                        @error('address') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/records" style="text-decoration:none;color:#888;font-size:14px;padding:8px 0;">← Back to Records</a>
                    <button type="submit" class="btn-main">Save Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection