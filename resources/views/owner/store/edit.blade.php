@extends('owner.layouts.app')

@section('title', __('Services'))

@push('after-styles')
    <style>
        #avatarPreview {
            max-width: 200px;
            max-height: 200px;
            width: 100%;
            height: auto;
            border-radius: 50%; /* Make it circular */
        }
    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Setup Store')
        </x-slot>

        <x-slot name="body">
            <form method="POST" action="{{ route('owner.store.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $store ? $store->id : null }}">
                <!-- Row for form content -->
                <div class="row">
                    <!-- Left side for form inputs -->
                    <div class="col-md-6">
                        <!-- Store Name -->
                        <div class="form-group">
                            <label for="store_name">Store Name</label>
                            <input type="text" class="form-control" id="store_name" name="store_name" value="{{ old('store_name') ?? ($store ? $store->store_name : null) }}" required>
                        </div>
                
                        <!-- Altitude -->
                        <div class="form-group">
                            <label for="longitude">longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') ?? ($store ? $store->longitude : null) }}" required>
                        </div>
                
                        <!-- Latitude -->
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') ?? ($store ? $store->latitude : null) }}" required>
                        </div>
                
                        <!-- Latitude -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ?? ($store ? $store->address : null) }}" required>
                        </div>
                    </div>
                    <!-- Right side for avatar preview and upload -->
                    <div class="col-md-6">
                        <!-- Avatar Upload -->
                        <div class="form-group">
                            <img id="avatarPreview" src="{{ asset($store->avatar ?? 'img/store_default.png') }}" class="mt-2" alt="Store Avatar" style="max-width: 200px; max-height: 200px;">
                            <br><label for="avatar">Avatar</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Store</button>
            </form>
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function () {
                    const preview = document.getElementById('avatarPreview');
                    preview.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            document.getElementById('avatar').addEventListener('change', previewImage);
        });
    </script>
@endpush
