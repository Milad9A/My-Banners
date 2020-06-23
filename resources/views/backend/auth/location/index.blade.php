@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.locations.management'))

@section('breadcrumb-links')
    @include('backend.auth.location.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.locations.management')
                    </h4>
                </div>
                <!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.auth.location.includes.header-buttons')
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            @foreach($locations as $location)
                                <a href="{{ route('admin.auth.location.edit', compact('location')) }}">
                                    <tr>
                                        <td>{{ $location->name }}</td>
                                        <td class="btn-td" style="width: 0px">@include('backend.auth.location.includes.actions', ['location' => $location])</td>
                                    </tr>
                                </a>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{--                         {!! $banners->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $banners->total()) }}--}}
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
