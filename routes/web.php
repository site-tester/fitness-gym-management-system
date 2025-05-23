<?php

use App\Http\Controllers\Admin\CustomDashboardController;
use App\Http\Controllers\BookNowController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GoogleAuthController;
use Spatie\Permission\Models\Role;
use App\Models\EquipmentInventory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('landing');

Auth::routes(['verify' => true]);

Route::get('/registration-completed', function(){
    return view('auth.registration_confirmed');
})->name('registration.completed');

Route::get('/about', function(){
    return view('about');
})->name('about.us');
Route::get('/contact-us', function(){
    return view('contact_us');
})->name('contact.us');
Route::post('/contact-us/send', [Controller::class, 'sendContactUs'])->name('send.contact.us');
Route::get('/workouts', [Controller::class, 'workoutView'])->name('workout');
Route::get('/equipments', [Controller::class, 'equipmentView'])->name('equipment');
Route::get('/get-equipment-details/{id}', function ($id) {
    $equipment = EquipmentInventory::find($id);

    if (!$equipment) {
        return response()->json([
            'error' => 'Equipment not found'
        ], 404);
    }

    return response()->json([
        'steps' => $equipment->steps ?? 'No Steps Found',
        'image' => $equipment->image ?? 'No Image Found',
        'name' => $equipment->equipment_name ?? 'No Equipment Name Found',
        'status' => 'Ready to Use' ?? 'No Status Found',
        // 'status' => $equipment->condition ?? 'No Status Found',
        'description' => $equipment->description ?? 'No Description Found',
        'quantity' => $equipment->quantity ?? 0,
    ]);
});
Route::get('/workout-details/{id}', [Controller::class, 'workoutDetails'])->name('workout.details');
Route::get('/privacy-policy', function(){
    return view('privacy_policy');
})->name('privacy.policy');

Route::get('/data-deletion-instruction', function(){
    return view('account-deletion');
})->name('account.deletion');

Route::middleware(['verified'])->group(function () {
    Route::get('/profile', [HomeController::class, 'viewProfile'])->name('profile');
    Route::post('/update-profile', [HomeController::class, 'updateProfile'])->name('profile.update');

    Route::post('/notification-subscribe', [HomeController::class, 'subscribeNotif'])->name('subscribe.notification');
    Route::post('/notification-unsubscribe', [HomeController::class, 'unsubscribeNotif'])->name('unsubscribe.notification');
    Route::get('/notification-test', [HomeController::class, 'testNotification'])->name('notification.test');


    Route::get('/book-now', [HomeController::class, 'bookNow'])->name('book.now');
    Route::get('/booked', [HomeController::class, 'bookedNow'])->name('booked.now');
    Route::get('/bookings', [HomeController::class, 'bookings'])->name('booking');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-progress', [HomeController::class, 'gymProgress'])->name('gym.progress');

    Route::post('/booking', [HomeController::class, 'bookNowPost'])->name('book.now.post');
    // Payment Routes
    Route::post('/paypal-checkout', [PaypalController::class, 'pay'])->name('paypal.checkout');
    Route::get('/paypal-success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal-error', [PaypalController::class, 'error'])->name('paypal.error');


    Route::get('/services/{categoryId}', [BookNowController::class, 'getServicesByCategory']);
    Route::get('/service/details/{serviceId}', [BookNowController::class, 'getServiceDetails']);
    Route::get('/booking-receipt/{id}', [BookNowController::class, 'showReceipt'])->name('reservations.show');
});

Route::post('/attendance/register', [AttendanceController::class, 'register'])->name('attendance.register');

Route::get('/gender-stats', [CustomDashboardController::class, 'getGenderStats']);
Route::get('/age-stats', [CustomDashboardController::class, 'getAgeStats']);
Route::get('/service-booking-stats', [CustomDashboardController::class, 'getServiceBookingStats']);
Route::get('/client-bookings-by-day', [CustomDashboardController::class, 'getClientBookingsByDay']);

// Google Redirect Routes
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// Facebook Redirect Routes
Route::get('/auth/facebook', [FacebookAuthController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/auth/facebook/callback', [FacebookAuthController::class, 'handleFacebookCallback']);

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
// Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\PageController@index'])
//     ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
