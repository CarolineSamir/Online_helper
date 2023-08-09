@extends('layouts.app')
@section('content')
    @livewireStyles
    @livewire('product')
    @livewireScripts

@endsection

@push('style')
    <style>
        .order-actions a{
            background: #f1f1f100 !important;
            border: none !important;
            margin-right: 11px !important;
        }
        .myButton{
            border: none;
            background: none;

        }
        button, input, optgroup, select, textarea {
            font-size: large;
        }

    </style>

@endpush
