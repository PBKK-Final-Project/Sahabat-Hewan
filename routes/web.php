<?php

use App\Events\MessageNotification;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
    
    Route::get('/consult', function () {
        return view('consult.consult');
    });
    
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

});



require __DIR__.'/auth.php';
