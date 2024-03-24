@extends('owner.layouts.app')

@section('title', __('Services'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Service')

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('owner.services.index')"
                    :text="__('Go Back')"
                />
            </x-slot>
        </x-slot>

        <x-slot name="body">
            <form method="POST" action="{{ route('owner.services.store') }}">
                @csrf
                <!-- Service Name -->
                <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input type="text" class="form-control" id="service_name" name="service_name" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </x-slot>
    </x-backend.card>
@endsection
