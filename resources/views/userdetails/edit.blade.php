@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-custom">
            <div class="page-title">Edit Record</div>

            <form method="POST" action="/records/{{ $detail->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="{{ $detail->full_name }}">
                        @error('full_name') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ $detail->email }}">
                        @error('email') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $detail->phone }}">
                        @error('phone') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="Male" {{ $detail->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $detail->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $detail->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ $detail->date_of_birth }}">
                        @error('date_of_birth') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" style="font-size:13px;">Add More Images</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold" style="font-size:13px;">Address</label>
                        <textarea name="address" class="form-control" rows="3">{{ $detail->address }}</textarea>
                        @error('address') <div style="font-size:12px;color:#e94560;margin-top:4px;">{{ $message }}</div> @enderror
                    </div>

                    @if($detail->images && count($detail->images) > 0)
                    <div class="col-12">
                        <label class="form-label fw-semibold" style="font-size:13px;">Current Images</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($detail->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" width="70" height="70" style="border-radius:6px;object-fit:cover;">
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/records" style="text-decoration:none;color:#888;font-size:14px;padding:8px 0;">← Back to Records</a>
                    <button type="submit" class="btn-main">Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection