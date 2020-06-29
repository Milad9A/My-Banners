@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="row mb-4">
    <div class="col">


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.banners.management')
                        </h4>
                    </div>


                    <div class="col-sm-2">
                        <div class="dropdown show" style="margin-right: 0px">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Banners
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="{{ route('frontend.index') }}">@lang('menus.backend.access.banners.all')</a>
                                @foreach(\App\Location::all() as $location)
                                <a class="dropdown-item"
                                    href="{{ route('frontend.banner.location', compact('location')) }}">@lang('menus.backend.access.banners.location')
                                    {{ $location->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
                <!--row-->

                <div class="row mt-4">

                    @foreach ($banners as $banner)

                    <div class="col-sm-2 mt-2">
                        <a href="{{ route('frontend.banner.show', compact('banner')) }}"
                            style="color:black; text-decoration: none;">
                            <div class="card"
                                style="background: {{ $banner->active ? ($banner->currentlyAvailable() ? '#4dbd74' : '') : '#ff3333'}} ">
                                <div class="card-body">
                                    <h5 class="card-title"> رقم الوجه الإعلاني: {{ $banner->number }}</h5>
                                    <p class="card-text">{{ $banner->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>

            </div>
            <!--card-body-->
        </div>
        <!--card-->















    </div>
    <!--col-->
</div>
<!--row-->
@endsection
