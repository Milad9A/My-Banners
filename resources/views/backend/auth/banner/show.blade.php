@extends('backend.layouts.app')

@section('title', __('labels.backend.access.banners.management') . ' | ' . __('labels.backend.access.banners.view'))

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
                        <small class="text-muted">@lang('labels.backend.access.banners.view')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

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
                                                     width="100%"/></td>
                                        </tr>

                                        <tr>
                                            <th>@lang('labels.backend.access.banners.tabs.content.overview.number')</th>
                                            <td>{{ $banner->number }}</td>
                                        </tr>

                                        <tr>
                                            <th>@lang('labels.backend.access.banners.tabs.content.overview.description')</th>
                                            <td>{{ $banner->description }}</td>
                                        </tr>

                                        <tr>
                                            <th>@lang('labels.backend.access.banners.tabs.content.overview.location_id')</th>
                                            <td>{{ $banner->location->name }}</td>
                                        </tr>

                                        <tr>
                                            <th></th>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Renting Schedule
                                            </th>
                                            <td></td>
                                        </tr>

                                        @foreach($banner->rents as $rent)

                                            <tr>
                                                <th>@lang('labels.backend.access.banners.tabs.content.overview.renting_began_at')</th>
                                                <td>{{ $rent->renting_began_at }}</td>
                                            </tr>

                                            <tr>
                                                <th>@lang('labels.backend.access.banners.tabs.content.overview.renting_ends_at')</th>
                                                <td>{{ $rent->renting_ends_at  }}</td>
                                            </tr>

                                            <tr>
                                                <th>@lang('labels.backend.access.banners.tabs.content.overview.name')</th>
                                                <td>{{ $rent->customer_name }}</td>
                                            </tr>

                                        @endforeach

                                    </table>
                                </div>
                            </div><!--table-responsive-->

                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                Add new renting details
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Renting Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.auth.rent.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="banner_id" value="{{ $banner->id }}">

                                <div class="field">
                                    <label for="customer_name">Customer's Name</label>

                                    <div class="form-control">
                                        <input
                                            class="input"
                                            type="text"
                                            name="customer_name"
                                            id="customer_name"
                                        >

                                        @error('customer_name')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div class="field">
                                    <label for="renting_began_at">Rent's Starting Date</label>

                                    <div class="form-control">
                                        <input
                                            class="input"
                                            type="date"
                                            name="renting_began_at"
                                            id="renting_began_at"
                                        >

                                        @error('renting_began_at')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div class="field">
                                    <label for="renting_ends_at">Rent's Ending Date</label>

                                    <div class="form-control">
                                        <input
                                            class="input"
                                            type="date"
                                            name="renting_ends_at"
                                            id="renting_ends_at"
                                        >

                                        @error('renting_ends_at')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--card-body-->
        <div class="card-footer">


            <div class="row">
                <form action="{{ route('admin.auth.banner.edit', compact('banner')) }}">
                    <div class="col">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </div><!--col-->
                </form>

                <form action="{{ route('admin.auth.banner.destroy', compact('banner')) }}">
                    <div class="col">
                        <button class="btn btn-danger">Delete</button>
                    </div><!--col-->
                </form>

            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection
