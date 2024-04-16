<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('/login', function () {
    return redirect()->back();
})->name('login');

Route::get('/checkout/{plan:stripe_price_id}/{plan_id}',  [SubscriptionController::class, 'checkout'])->name('checkout');
Route::get('/subscribe/{plan:id}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/cancel',    [SubscriptionController::class, 'cancel'])->name('cancel');

Route::get('test', function () {
   return view('report');
});

/*
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';*/
