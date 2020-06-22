@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.banners.management'))

@section('breadcrumb-links')
    @include('backend.auth.banner.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.banners.management')
                    </h4>
                </div>
                <!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.auth.banner.includes.header-buttons')
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">

                @foreach ($banners as $banner)

                    <div class="col-sm-2">
                        <a href="{{ route('admin.auth.banner.show', compact('banner')) }}"
                           style="color:black; text-decoration: none;"
                        >
                            <div class="card" style="background: {{ $banner->active ? ($banner->currentlyAvailable() ? '#4dbd74' : '') : '#ff3333'}} ">
                                <div class="card-body">
                                    <h5 class="card-title"> رقم الوجه الإعلاني: {{ $banner->number }}</h5>
                                    <p class="card-text">{{ $banner->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>

            <!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{-- {!! $banners->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $banners->total()) }}
                        --}}
                    </div>
                </div>
                <!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {{-- {!! $banners->render() !!} --}}
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->
        </div>
        <!--card-body-->
    </div>
    <!--card-->
@endsection
