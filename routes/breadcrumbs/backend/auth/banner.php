<?php

Breadcrumbs::for('admin.auth.banner.index', function ($trail) {
    $trail->push(__('labels.backend.access.banners.management'), route('admin.auth.banner.index'));
});

Breadcrumbs::for('admin.auth.banner.create', function ($trail) {
    $trail->push(__('labels.backend.access.banners.create'), route('admin.auth.banner.create'));
});

Breadcrumbs::for('admin.auth.banner.show', function ($trail, $id) {
    $trail->parent('admin.auth.banner.index');
    $trail->push(__('labels.backend.access.banners.view'), route('admin.auth.banner.show', $id));
});

Breadcrumbs::for('admin.auth.banner.edit', function ($trail, $id) {
    $trail->parent('admin.auth.banner.index');
    $trail->push(__('menus.backend.access.banners.edit'), route('admin.auth.banner.edit', $id));
});

Breadcrumbs::for('admin.auth.banner.available', function ($trail) {
    $trail->push(__('labels.backend.access.banners.available'), route('admin.auth.banner.available'));
});

Breadcrumbs::for('admin.auth.banner.location', function ($trail, $id) {
    $trail->push('Title Here', route('admin.auth.banner.location', $id));
});
