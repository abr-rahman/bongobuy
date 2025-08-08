@extends('layouts.admin-master')
@section('section')
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Thana</h4>
        </div>
        <form action="{{ route('thanas.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Select Country <span class="text-danger">*</span></label>
                    <select name="district_id" id="" class="form-control select2">
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Thana Name (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Thana Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Thana Name (Bangla) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="bn_name" placeholder="Thana Name" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
