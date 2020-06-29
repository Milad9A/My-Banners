@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.banners.management')
                    <small class="text-muted">@lang('labels.backend.access.banners.view')</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.image')</th>
                                        <td><img src="{{ $banner->image }}" class="user-profile-image" alt=""
                                                width="100%" /></td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.number')</th>
                                        <td>{{ $banner->number }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.description')
                                        </th>
                                        <td>{{ $banner->description }}</td>
                                    </tr>

                                    <tr>
                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.location_id')
                                        </th>
                                        <td>{{ $banner->location->name }}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <!--table-responsive-->





                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <tr>
                                        <th>
                                            Renting Schedule
                                        </th>
                                        <td></td>
                                    </tr>

                                    @foreach($banner->rents as $rent)

                                    <tr>
                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.name')</th>
                                        <td>{{ $rent->customer_name }}</td>

                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.renting_began_at')
                                        </th>
                                        <td>{{ $rent->renting_began_at}}</td>

                                        <th>@lang('labels.backend.access.banners.tabs.content.overview.renting_ends_at')
                                        </th>
                                        <td>{{ $rent->renting_ends_at  }}</td>

                                    </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <!--table-responsive-->

                    </div>
                    <!--tab-->
                </div>
                <!--tab-content-->
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->

</div>
<!--card-->

@endsection
