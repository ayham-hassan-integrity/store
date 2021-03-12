@extends('backend.layouts.app')

@section('title', __('View Product'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Product')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $product->id }}</td>
                </tr>
                <tr>
                    <th>@lang('name')</th>
                    <td>{{   $product->name }}</td>
                </tr>
                <tr>
                    <th>@lang('description')</th>
                    <td>{{   $product->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Product Created'):</strong> @displayDate($product->created_at) ({{   $product->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($product->updated_at) ({{   $product->updated_at->diffForHumans() }})

                @if($product->trashed())
                    <strong>@lang('Product Deleted'):</strong> @displayDate($product->deleted_at) ({{   $product->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection