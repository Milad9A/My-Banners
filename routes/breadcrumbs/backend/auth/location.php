<?php

Breadcrumbs::for('admin.auth.location.index', function ($trail) {
    $trail->push(__('labels.backend.access.locations.management'), route('admin.auth.location.index'));
});

Breadcrumbs::for('admin.auth.location.create', function ($trail) {
    $trail->push(__('labels.backend.access.locations.create'), route('admin.auth.location.create'));
});

Breadcrumbs::for('admin.auth.location.edit', function ($trail, $id) {
    $location = \App\Location::findOrFail($id);
    $trail->push(__('labels.backend.access.locations.create'), route('admin.auth.location.edit', compact('location')));
});
