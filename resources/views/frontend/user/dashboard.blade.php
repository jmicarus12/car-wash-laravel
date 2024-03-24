@extends('frontend.layouts.auth')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Dashboard')
                    </x-slot>

                    <x-slot name="body">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body bg-facebook p-4 content-center text-white d-block">
                                        <div class="font-5xl"></div>
                                        <div class="text-uppercase text-value-lg pt-2">
                                            <i class="fa fa-users"></i> @lang('Total Bookings')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body bg-facebook p-4 content-center text-white d-block">
                                        <div class="font-5xl"></div>
                                        <div class="text-uppercase text-value-lg pt-2">
                                            <i class="fa fa-users"></i> @lang('Total Cars')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body bg-facebook p-4 content-center text-white d-block">
                                        <div class="font-5xl"></div>
                                        <div class="text-uppercase text-value-lg pt-2">
                                            <i class="fa fa-users"></i> @lang('Place Holder')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
