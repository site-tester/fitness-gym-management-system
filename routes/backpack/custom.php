<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('dashboard', 'CustomDashboardController@dashboard')->name('backpack.dashboard');
    Route::crud('user', 'UserCrudController');
    // Route::post('attendance', 'AttendanceController@register');
    Route::crud('membership-detail', 'MembershipDetailCrudController');
    Route::crud('trainer-detail', 'TrainerDetailCrudController');
    Route::crud('reservation', 'ReservationCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('service-category', 'ServiceCategoryCrudController');
    Route::crud('contactus-inbox', 'ContactusInboxCrudController');
    Route::crud('payment-method', 'PaymentMethodCrudController');
    Route::crud('equipment-inventory', 'EquipmentInventoryCrudController');
    Route::crud('inventory', 'InventoryCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
