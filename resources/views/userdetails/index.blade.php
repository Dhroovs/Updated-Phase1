@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-title mb-0">User Records</div>
    <a href="/records/create" class="btn-main" style="text-decoration:none;border-radius:5px;padding:8px 18px;font-size:13px;">+ Add Record</a>
</div>

@if($details->isEmpty())
    <div class="card-custom text-center py-5">
        <div style="font-size:40px;margin-bottom:12px;">📋</div>
        <div style="font-size:16px;color:#888;">No records found. Add your first one!</div>
        <a href="/records/create" class="btn-main d-inline-block mt-3" style="text-decoration:none;border-radius:5px;padding:8px 20px;font-size:13px;">+ Add Record</a>
    </div>
@else
    <div class="card-custom p-0" style="overflow:hidden;">
        <table class="table mb-0" style="font-size:13px;">
            <thead style="background:#1a1a2e;color:#fff;">
                <tr>
                    <th class="px-3 py-3">#</th>
                    <th class="px-3 py-3">Full Name</th>
                    <th class="px-3 py-3">Email</th>
                    <th class="px-3 py-3">Phone</th>
                    <th class="px-3 py-3">Gender</th>
                    <th class="px-3 py-3">Date of Birth</th>
                    <th class="px-3 py-3">Images</th>
                    <th class="px-3 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td class="px-3 py-2">{{ $loop->iteration }}</td>
                    <td class="px-3 py-2">{{ $detail->full_name }}</td>
                    <td class="px-3 py-2">{{ $detail->email }}</td>
                    <td class="px-3 py-2">{{ $detail->phone }}</td>
                    <td class="px-3 py-2">{{ $detail->gender }}</td>
                    <td class="px-3 py-2">{{ $detail->date_of_birth }}</td>
                    <td class="px-3 py-2">
                        @if($detail->images && count($detail->images) > 0)
                            @foreach($detail->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" width="36" height="36" style="border-radius:4px;object-fit:cover;margin-right:3px;">
                            @endforeach
                        @else
                            <span style="color:#bbb;">—</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">
                        <a href="/records/{{ $detail->id }}/edit" style="font-size:12px;color:#1a1a2e;text-decoration:none;border:1px solid #1a1a2e;padding:3px 10px;border-radius:4px;margin-right:4px;">Edit</a>
                        <form method="POST" action="/records/{{ $detail->id }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this record?')" style="font-size:12px;color:#e94560;background:transparent;border:1px solid #e94560;padding:3px 10px;border-radius:4px;cursor:pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection