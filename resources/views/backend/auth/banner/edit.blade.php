@extends('backend.layouts.app')

@section('title', __('labels.backend.access.banners.management') . ' | ' . __('labels.backend.access.banners.edit'))

@section('breadcrumb-links')
    @include('backend.auth.banner.includes.breadcrumb-links')
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.auth.banner.update', compact('banner')) }}"
          enctype="multipart/form-data"
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
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.name'))->class('col-md-2 form-control-label')->for('customer_name') }}

                            <div class="col-md-10">
                                {{ html()->text('customer_name')
                                    ->class('form-control')
                                    ->placeholder($banner->rents->last()->customer_name)
                                    ->value($banner->rents->last()->customer_name)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.number'))->class('col-md-2 form-control-label')->for('number') }}

                            <div class="col-md-10">
                                {{ html()->text('number')
                                    ->class('form-control')
                                    ->placeholder($banner->number)
                                    ->value($banner->number)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.description'))->class('col-md-2 form-control-label')->for('description') }}

                            <div class="col-md-10">
                                {{ html()->textarea('description')
                                    ->class('form-control')
                                    ->placeholder($banner->description)
                                    ->value($banner->description)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <!-- Material checked -->
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input name="active" type="checkbox" class="custom-control-input" id="active" {{ $banner->active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="active">Active</label>
                        </div>

{{--                        <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                        <div class="checkbox d-flex align-items-center">--}}
{{--                            <label for="active">Active</label>--}}

{{--                            <div class="select">--}}
{{--                                <select name="role">--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <option value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

{{--                                @error('role')--}}
{{--                                <p class="help is-danger">{{ $message }}</p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.renting_began_at'))->class('col-md-2 form-control-label')->for('renting_began_at') }}

                            <div class="col-md-10">
                                {{ html()->date('renting_began_at')
                                    ->class('form-control')
                                    ->value($banner->rents->last()->renting_began_at)
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.renting_ends_at'))->class('col-md-2 form-control-label')->for('renting_ends_at') }}

                            <div class="col-md-10">
                                {{ html()->date('renting_ends_at')
                                    ->class('form-control')
                                    ->value($banner->rents->last()->renting_ends_at)
                                    ->attribute('maxlength', 191) }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.banners.location'))->class('col-md-2 form-control-label') }}

                            <div class="col-md-10">
                                <div class="select control">
                                    <select name="location_id"
                                            class="browser-default custom-select">
                                        <option selected
                                                value="{{ $banner->location->id }}">{{ $banner->location->name }}</option>
                                        @foreach($locations->except([$banner->location->id]) as $location)
                                            <option
                                                value="{{$location->id}}">{{$location->name}}</option>
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
                                    <input
                                        class="fa-file @error('image') is-danger @enderror"
                                        name="image"
                                        id="image"
                                        type="file"
                                        value="{{ old('image') }}"
                                    >

                                    @error('image')
                                    <p class="help is-danger">{{ $errors->first('image') }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.banner.show', compact('banner')), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--row-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    </form>
@endsection
