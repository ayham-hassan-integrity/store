@extends('backend.layouts.app')

@section('title', __('Deleted Products'))

@section('breadcrumb-links')
    @include('backend.product.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Products')
        </x-slot>

        <x-slot name="body">
            <livewire:product-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection