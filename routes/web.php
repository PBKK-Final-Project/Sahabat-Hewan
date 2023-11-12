<?php

use App\Events\MessageNotification;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage.landingPage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', function () {
        return view("home.home");
    });
    
    Route::get('/landing', function () {
        return view('landingPage.landingPage');
    });
    
    Route::get('/consult', [ConsultationController::class, 'index']);
    
    Route::get('/chat', function () {
        return view('chat.index');
    });

    Route::get('/mychat/{dokter_id}', [ChatController::class, 'myChat']);

    Route::post('/mychat/{dokter_id}', [ChatController::class, 'store']);

    Route::get('/dokter', [ChatController::class,'index']);

    Route::get('/me', [UserController::class, 'me']);

    Route::get('/dokter/{id}', [ChatController::class, 'show']);
    

    Route::post('/send-notification', [ChatController::class, 'sendNotification'])->middleware('web');

    Route::get('/sender-receiver', [ChatController::class, 'senderReceiver']);

    // Dokter page
    Route::get('/dokter-detail/{id}', [ConsultationController::class, 'show']);

    Route::get('/dokter-detail-data/{id}', [UserController::class, 'showData']);

    Route::post('/payment/{id}', [PaymentController::class, 'createPayment']);

    Route::get('/payment-status/{id}', [PaymentController::class, 'paymentStatus']);

    // shop page
    Route::get('/shop', [ProductController::class, 'index']);
    
    Route::get('/product-detail/{id}', [ProductController::class, 'show']);
    
    Route::get('/products/{categoryId}/{typeId}', [ProductController::class, 'showByCategoryAndType']);

    Route::get('/products-search/{keyword}', [ProductController::class, 'search']);
    Route::get('/products-search', [ProductController::class, 'getAllProducts']);
    Route::get('/products-sort/{sort}', [ProductController::class, 'sort']);

    // Cart page
    Route::get('/cart', [CartController::class,'index']);
    Route::post('/cart', [CartController::class,'store']);
    Route::delete('/cart/{id}', [CartController::class,'destroy']);

});

// Route::get('/cart', function () {
//     return view('shop.cart-page');
// });



require __DIR__.'/auth.php';
