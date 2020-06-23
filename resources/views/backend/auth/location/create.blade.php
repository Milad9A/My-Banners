@extends('backend.layouts.app')

@section('title', __('labels.backend.access.locations.management') . ' | ' . __('labels.backend.access.locations.create'))

@section('breadcrumb-links')
    @include('backend.auth.location.includes.breadcrumb-links')
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.auth.location.store') }}"
          class="form-horizontal">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.locations.management')
                            <small class="text-muted">@lang('labels.backend.access.locations.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.locations.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.locations.name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.location.index'), __('buttons.general.cancel')) }}
                </div>

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div>
            </div>
        </div>

    </form>

@endsection
