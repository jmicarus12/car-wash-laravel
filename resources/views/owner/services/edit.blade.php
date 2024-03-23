@extends('owner.layouts.app')

@section('title', __('Services'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Setup Store')
        </x-slot>

        <x-slot name="body">
            @if (auth()->user()->store)
                Please setup your store before accessing the services. <br>
                <a href="http://" target="_blank" rel="noopener noreferrer">Click here to setup</a>
            @else
                
            @endif
        </x-slot>
    </x-backend.card>
@endsection
