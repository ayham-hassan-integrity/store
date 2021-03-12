@extends('backend.layouts.app')

@section('title', __(' Products'))

@section('breadcrumb-links')
    @include('backend.product.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Products')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.product.create')"
                :text="__('Create Product')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:product-table/>
        </x-slot>
    </x-backend.card>
@endsection