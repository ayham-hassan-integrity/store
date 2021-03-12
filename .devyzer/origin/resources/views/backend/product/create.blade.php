@extends('backend.layouts.app')

@section('title', __('Create Product'))

@section('content')
    <x-forms.post :action="route('admin.product.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Product')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{  __('name') }} " value="{{  old('name') }} "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('description')</label>

                    <div class="col-md-10">
                        <input type="text" name="description" class="form-control" placeholder="{{  __('description') }} " value="{{  old('description') }} "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Product')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection