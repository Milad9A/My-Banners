<?php

use App\Http\Controllers\Backend\Auth\Banner\BannerStatusController;
use App\Http\Controllers\Backend\Auth\BannersController;
use App\Http\Controllers\Backend\Auth\Location\LocationsController;
use App\Http\Controllers\Backend\Auth\Rent\RentController;
use App\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Http\Controllers\Backend\Auth\User\UserConfirmationController;
use App\Http\Controllers\Backend\Auth\User\UserController;
use App\Http\Controllers\Backend\Auth\User\UserPasswordController;
use App\Http\Controllers\Backend\Auth\User\UserSessionController;
use App\Http\Controllers\Backend\Auth\User\UserSocialController;
use App\Http\Controllers\Backend\Auth\User\UserStatusController;

// All route names are prefixed with 'admin.auth'.
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'namespace' => 'Auth',
    'middleware' => 'role:' . config('access.users.admin_role'),
], function () {
    // User Management
    Route::group(['namespace' => 'User'], function () {
        // User Status'
        Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
        Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');

        // User CRUD
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');

        // Specific User
        Route::group(['prefix' => 'user/{user}'], function () {
            // User
            Route::get('/', [UserController::class, 'show'])->name('user.show');
            Route::get('edit', [UserController::class, 'edit'])->name('user.edit');
            Route::patch('/', [UserController::class, 'update'])->name('user.update');
            Route::delete('/', [UserController::class, 'destroy'])->name('user.destroy');

            // Account
            Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);

            // Social
            Route::delete('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');

            // Confirmation
            Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
            Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');

            // Password
            Route::get('password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
            Route::patch('password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');

            // Session
            Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');

            // Deleted
            Route::get('delete', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
            Route::get('restore', [UserStatusController::class, 'restore'])->name('user.restore');
        });
    });

    // Role Management
    Route::group(['namespace' => 'Role'], function () {
        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role/{role}'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });

    // Banner Management
    Route::group(['namespace' => 'Banner'], function () {
        Route::get('banner', [BannersController::class, 'index'])->name('banner.index');

        Route::get('banner/available', [BannerStatusController::class, 'getAvailable'])->name('banner.available');

        Route::get('banner/create', [BannersController::class, 'create'])->name('banner.create');
        Route::post('banner', [BannersController::class, 'store'])->name('banner.store');

        Route::get('banner/location/{location}', [BannerStatusController::class, 'getByLocation'])->name('banner.location');

        // Specific Banner
        Route::group(['prefix' => 'banner/{banner}'], function () {
            // Banner
            Route::get('/', [BannersController::class, 'show'])->name('banner.show');
            Route::get('edit', [BannersController::class, 'edit'])->name('banner.edit');
            Route::patch('/', [BannersController::class, 'update'])->name('banner.update');
            Route::get('/delete', [BannersController::class, 'destroy'])->name('banner.destroy');

        });

    });

    Route::group(['namespace' => 'Location'], function (){
        Route::get('location', [LocationsController::class, 'index'])->name('location.index');
        Route::post('location', [LocationsController::class, 'store'])->name('location.store');
        Route::get('location/create', [LocationsController::class, 'create'])->name('location.create');
        Route::get('location/{location}/edit', [LocationsController::class, 'edit'])->name('location.edit');
        Route::patch('location/{location}', [LocationsController::class, 'update'])->name('location.update');
        Route::get('location/{location}/delete', [LocationsController::class, 'destroy'])->name('location.destroy');
    });

    Route::group(['namespace' => 'Rent'], function (){
        Route::post('banner/rent', [RentController::class, 'store'])->name('rent.store');
        Route::get('banner/rent/{rent}/delete', [RentController::class, 'destroy'])->name('rent.destroy');
    });
});
