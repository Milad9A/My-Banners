@extends('backend.layouts.app')

@section('title', __('labels.backend.access.banners.management') . ' | ' . __('labels.backend.access.banners.edit'))

@section('breadcrumb-links')
@include('backend.auth.banner.includes.breadcrumb-links')
@endsection

@section('content')

<form method="POST" action="{{ route('admin.auth.banner.update', compact('banner')) }}" enctype="multipart/form-data"
    class="form-horizontal">
    @csrf
    @method('PATCH')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.banners.management')
                        <small class="text-muted">@lang('labels.backend.access.banners.edit')</small>
                    </h4>
                </div>
                <!--col-->
            </div>
            <!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.banners.number'))->class('col-md-2 form-control-label')->for('number') }}

                        <div class="col-md-10">
                            {{ html()->text('number')
                                    ->class('form-control')
                                    ->placeholder($banner->number)
                                    ->value($banner->number)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                        </div>
                        <!--col-->
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.banners.description'))->class('col-md-2 form-control-label')->for('description') }}

                        <div class="col-md-10">
                            {{ html()->textarea('description')
                                    ->class('form-control')
                                    ->placeholder($banner->description)
                                    ->value($banner->description)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                        </div>
                        <!--col-->
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.banners.location'))->class('col-md-2 form-control-label') }}

                        <div class="col-md-10">
                            <div class="select control">
                                <select name="location_id" class="browser-default custom-select">
                                    <option selected value="{{ $banner->location->id }}">{{ $banner->location->name }}
                                    </option>
                                    @foreach($locations->except([$banner->location->id]) as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </select>

                                @error('location_id')
                                <p class="help is-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        {{ html()->label(__('validation.attributes.backend.access.banners.image'))->class('col-md-2 form-control-label') }}

                        <div class="col-md-10">
                            <div class="control">
                                <input class="fa-file @error('image') is-danger @enderror" name="image" id="image"
                                    type="file" value="{{ old('image') }}">

                                @error('image')
                                <p class="help is-danger">{{ $errors->first('image') }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="custom-control custom-switch">
                        <input name="available" type="checkbox" class="custom-control-input" id="available"
                            {{ $banner->available ? 'checked' : '' }}>
                        <label class="custom-control-label" for="available">Available</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input name="active" type="checkbox" class="custom-control-input" id="active"
                            {{ $banner->active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="active">Active</label>
                    </div>

                </div>
                <!--col-->
            </div>
            <!--row-->
        </div>
        <!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.banner.show', compact('banner')), __('buttons.general.cancel')) }}
                </div>
                <!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div>
                <!--row-->
            </div>
            <!--row-->
        </div>
        <!--card-footer-->
    </div>
    <!--card-->
</form>
@endsection
