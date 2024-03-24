@extends('frontend.layouts.auth')

@section('title', __('Bookings'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Bookings')

                        <x-slot name="headerActions">
                            <x-utils.link
                                icon="c-icon cil-plus"
                                class="card-header-action"
                                :href="route('frontend.bookings.create')"
                                :text="__('Create Booking')"
                            />
                        </x-slot>
                    </x-slot>

                    <x-slot name="body">
                        <livewire:frontend.booking-table />
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
