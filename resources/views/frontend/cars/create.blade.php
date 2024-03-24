@extends('frontend.layouts.auth')

@section('title', __('Cars'))

@push('after-styles')
    <style>
        #avatarPreview {
            width: 150px;
            height: 150px;
            max-width: 150px;
            max-height: 150px;
            height: auto;
            border: 1px solid #555;
            border-radius: 65%; /* Make it circular */
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Add Car')

                        <x-slot name="headerActions">
                            <x-utils.link
                                class="card-header-action"
                                :href="route('frontend.cars.index')"
                                :text="__('Go Back')"
                            />
                        </x-slot>
                    </x-slot>

                    <x-slot name="body">
                        <form method="POST" action="{{ route('frontend.cars.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Row for form content -->
                            <div class="row">
                                <!-- Left side for form inputs -->
                                <div class="col-md-6">
                                    <!-- Store Name -->
                                    <div class="form-group">
                                        <label for="car_name">Car Name</label>
                                        <input type="text" class="form-control" id="car_name" name="car_name" value="{{ old('car_name') ?? '' }}" required>
                                    </div>
                                </div>
                                <!-- Right side for avatar preview and upload -->
                                <div class="col-md-6">
                                    <!-- Avatar Upload -->
                                    <div class="form-group">
                                        <img id="avatarPreview" src="{{ asset('img/car_default.png') }}" class="mt-2" alt="Store Avatar">
                                        <br><label for="avatar">Avatar</label>
                                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Add Car</button>
                        </form>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
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
