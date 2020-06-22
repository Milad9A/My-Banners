<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.access.banners.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.auth.banner.index') }}">@lang('menus.backend.access.banners.all')</a>
                <a class="dropdown-item" href="{{ route('admin.auth.banner.create') }}">@lang('menus.backend.access.banners.create')</a>
                <a class="dropdown-item" href="{{ route('admin.auth.banner.available') }}">@lang('menus.backend.access.banners.available')</a>
                @foreach(\App\Location::all() as $location)
                    <a class="dropdown-item" href="{{ route('admin.auth.banner.location', compact('location')) }}">@lang('menus.backend.access.banners.location') {{ $location->name }}</a>
                @endforeach
{{--                <a class="dropdown-item" href="{{ route('admin.auth.banner.deleted') }}">@lang('menus.backend.access.banners.deleted')</a>--}}
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
