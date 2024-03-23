@extends('owner.layouts.app')

@section('title', __('Store'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Store')

            <x-slot name="headerActions">
                <x-utils.link
                    icon="fas fa-pen"
                    class="card-header-action"
                    :href="route('owner.store.edit')"
                    :text="__('Edit Store')"
                />
            </x-slot>
        </x-slot>

        <x-slot name="body">
            <div class="row">
                <div class="col-md-6">
                    <!-- Avatar Preview -->
                    <div class="form-group">
                        <img src="{{ asset($store->avatar ?? 'img/store_default.png') }}" class="mt-2" alt="Store Avatar" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Store Name -->
                    <div class="form-group d-inline-block mr-3">
                        <label for="store_name" class="mr-2">Store Name:</label>
                        <p class="mb-0">{{ $store ? $store->store_name : 'N/A' }}</p>
                    </div>
                    
                    <!-- Longitude -->
                    <div class="form-group d-inline-block mr-3">
                        <label for="longitude" class="mr-2">Longitude:</label>
                        <p class="mb-0">{{ $store ? $store->longitude : 'N/A' }}</p>
                    </div>
                    
                    <!-- Latitude -->
                    <div class="form-group d-inline-block">
                        <label for="latitude" class="mr-2">Latitude:</label>
                        <p class="mb-0">{{ $store ? $store->latitude : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
