<?php

use App\Events\MessageNotification;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AcademyController;
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

    Route::get('/academy', [AcademyController::class, 'index']);
    Route::get('/academy/{article:slug}', [AcademyController::class, 'singleAcademy']);
    
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

    Route::get('/payment-status/{consultationId}/{id}', [PaymentController::class, 'paymentStatus']);
    Route::get('/consultation/{id}', [PaymentController::class, 'showConsultation']);

    // shop page
    Route::get('/shop', [ProductController::class, 'index']);
    
    Route::get('/product-detail/{id}', [ProductController::class, 'show']);
    
    Route::get('/products/{categoryId}/{typeId}', [ProductController::class, 'showByCategoryAndType']);

    Route::get('/products-search/{keyword}', [ProductController::class, 'search']);
    Route::get('/products-search', [ProductController::class, 'getAllProducts']);
    Route::get('/products-sort/{sort}', [ProductController::class, 'sort']);
    
    Route::post('/product-review', [ProductReviewController::class,'storeReview']);

    // Cart page
    Route::get('/cart', [CartController::class,'index']);
    Route::post('/cart', [CartController::class,'store']);
    Route::delete('/cart/{id}', [CartController::class,'destroy']);

    // admin dashboard
    Route::get('/admin', function()
    {
        return view('admin.admin-dashboard');
    })->middleware('admin-dashboard');

    // admin category

    Route::middleware('admin-dashboard')->group(function () {
        Route::get('/create-category', [CategoryController::class, 'getCategory']);
        Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory']);
        Route::post('/create-category', [CategoryController::class, 'storeCategory']);
        Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);
    
        // admin type
        Route::get('/create-type', [TypeController::class, 'getType']);
        Route::post('/update-type/{id}', [TypeController::class, 'updateType']);
        Route::post('/create-type', [TypeController::class, 'storeType']);
        Route::delete('/delete-type/{id}', [TypeController::class, 'deleteType']);
    
        Route::get('/create-product', [ProductController::class,'create']);
        Route::post('/create-product', [ProductController::class,'store']);
        Route::get('/products', [ProductController::class,'products']);
    
        Route::delete('/delete-product/{id}', [ProductController::class,'destroy']);
        Route::get('/edit-product/{id}', [ProductController::class,'edit']);
        Route::post('/edit-product/{id}', [ProductController::class,'update']);
        Route::post('/update-shipping-status/{id}', [OrderController::class,'updateShippingStatus']);

        Route::get('/create-academy', [AcademyController::class, 'getAcademy']);
        // Route::post('/create-academy', [AcademyController::class, 'storeAcademy']);

        foreach (scandir($path = app_path('Http\Module')) as $dir) {
            if (file_exists($filepath = "{$path}/{$dir}/Academy/Presentation/web.php")) {
                require $filepath;
            }
        }
    });


    Route::post('/cart-payment', [OrderController::class,'createPayment']);
    Route::post('/buy', [OrderController::class,'buy']);

    Route::get('/user-orders', [OrderController::class,'index']);
    Route::get('/user-order-data', [OrderController::class,'orderData']);
    Route::get('/orders', [OrderController::class,'orders']);

    // rating
    Route::post('/rating/{id}', [RatingController::class,'store']);



});

// Route::get('/cart', function () {
//     return view('shop.cart-page');
// });



require __DIR__.'/auth.php';
