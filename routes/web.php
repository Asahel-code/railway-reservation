<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentInfoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\TrainController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\PassengerAgeController;
use App\Http\Controllers\Admin\ContainerSizeController;
use App\Http\Controllers\Admin\SeatTypeController;
use App\Http\Controllers\Admin\ManageTicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tickets', [HomeController::class, 'tickets'])->name('tickets.search');
//Route::get('/tickets', [HomeController::class, 'tickets'])->name('tickets.list');




Route::middleware(['auth'])->group(function(){
    Route::resource('contact', ContactController::class);

    Route::get('/{ticket_value}/passenger-details', [TicketController::class, 'index'])->name('passenger-details.index');
    Route::post('/passenger-details', [TicketController::class, 'store'])->name('passenger-details.store');
    
    Route::get('/{ticket_value}/{passenger_name}/payment-details', [PaymentInfoController::class, 'index'])->name('paymentinfo.index');
    Route::post('payment-details', [PaymentInfoController::class, 'store'])->name('paymentinfo.store');
    Route::get('/{ticket_value}/{passenger_name}/{payment_name}/confirmation', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/notification', [HomeController::class, 'notification'])->name('payment.notification');
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('train', TrainController::class);
    Route::resource('destination', DestinationController::class);
    Route::resource('seat-type', SeatTypeController::class);
    Route::resource('container-size', ContainerSizeController::class);
    Route::resource('passenger-age', PassengerAgeController::class);
    Route::resource('ticket', ManageTicketController::class);
});
