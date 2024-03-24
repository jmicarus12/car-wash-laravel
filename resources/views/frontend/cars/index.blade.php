@extends('frontend.layouts.auth')

@section('title', __('Cars'))

@push('after-styles')
    <style>
        .avatar-preview {
            width: 50px;
            height: 50px;
            max-width: 50px;
            max-height: 50px;
            height: auto;
            border: 1px solid #555;
            border-radius: 55%; /* Make it circular */
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Cars')

                        <x-slot name="headerActions">
                            <x-utils.link
                                icon="c-icon cil-plus"
                                class="card-header-action"
                                :href="route('frontend.cars.create')"
                                :text="__('Add Car')"
                            />
                        </x-slot>
                    </x-slot>

                    <x-slot name="body">
                        <livewire:frontend.car-table :userId="auth()->user()->id"/>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
