@extends('owner.layouts.app')

@section('title', __('Services'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Services')
        </x-slot>

        <x-slot name="body">
            @if (auth()->user()->store)
                <livewire:owner.service-table />
            @else
                Please setup your store before accessing the services. <br>
                <a href="{{ route('owner.store.edit') }}" rel="noopener noreferrer">Click here to setup</a>
            @endif
        </x-slot>
    </x-backend.card>
@endsection
