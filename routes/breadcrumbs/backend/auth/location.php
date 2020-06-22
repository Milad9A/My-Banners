<?php

Breadcrumbs::for('admin.auth.location.index', function ($trail) {
    $trail->push(__('labels.backend.access.locations.management'), route('admin.auth.location.index'));
});
