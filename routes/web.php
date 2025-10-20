<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Navigationcontroller;
use App\Http\Controllers\OrderController;
use App\Models\Schedule;
use App\Models\SliderImage;
use App\Models\Workout;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\Usercontroller;

use App\Livewire\PriceCalculator;
use Spatie\Sitemap\Tags\Url;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\WorkoutLog;
use Spatie\Sitemap\Sitemap;
use App\Models\MembershipPayment;

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




// Default route
Route::get("/", [homecontroller::class, "index"])->name('home');


// Booking from the home page
Route::resource('bookings', BookingController::class);

// navigation routes
Route::get('/our_services', [Navigationcontroller::class, 'our_services'])->name('our_services');
Route::get('/pricing', [Navigationcontroller::class, 'pricing'])->name('pricing');
Route::get('/bmi', [Navigationcontroller::class, 'bmi'])->name('bmi');
Route::get('/contact', [Navigationcontroller::class, 'contact'])->name('contact');

// Add to cart and product order routes

Route::resource('products',\App\Http\Controllers\ProductsController::class);
Route::get('cart',[\App\Http\Controllers\ProductsController::class,"cart"])->name('cart');
Route::post('/checkout/process', [OrderController::class, 'processOrder'])->name('checkout.process');
Route::get('order/user-info',[\App\Http\Controllers\OrderController::class,"user_info"]);
Route::post('/',[\App\Http\Controllers\Cartcontroller::class, 'store'])->name('cart.store');
Route::post('upload-slip', [OrderController::class, 'uploadSlip'])->name('upload.slip');
Route::get('/thank-you', function () {
    return view('pages.thank-you-page');
})->name('thank.you');

Route::get('/thank-you-cod', function () {
    return view('pages.thank-you-cod-page');
})->name('thank.you.cod');

Route::get("order-complete", [\App\Http\Controllers\OrderController::class, 'order_complete'])->name('order_complete');

// hero img route
Route::get('/slider-images', function () {
    return response()->json(
        SliderImage::with('media')->get()->map(fn ($slider) => $slider->getFirstMediaUrl('slider_images'))
    );
})->name('slider.images.json');


//Dashboard routes

Route::get('/workout-log/{id}', function ($id) {
    $workoutLog = WorkoutLog::with(['exerciseLogs.setLogs'])->findOrFail($id);

    return view('workoutlog.show', ['workoutLog' => $workoutLog]);
})->name('workout-log.show');

// Route::get('/schedules/{schedule}', function (Schedule $schedule) {
//     return view('filament.custom-schedule-view', compact('schedule'));
// })->name('filament.resources.schedules.view');

Route::get('/schedules/{schedule}', function (Schedule $schedule) {
    // Load related data like workouts and exercises if needed
    $schedule->load('workouts.exercises');

    // Return the Blade view with the schedule data
    return view('schedules.show', ['schedule' => $schedule]);
})->name('schedules.show');


Route::get('/workouts/{id}', function ($id) {
    $workout = Workout::with('exercises')->findOrFail($id);
    return view('workout.show', compact('workout'));
})->name('workout.show');

// Creating a sitemap

Route::post('save-push-notification-sub', [\App\Http\Controllers\PushNotificationController::class, 'saveSubscription']);

Route::get('/sitemap', function () {
    $sitemap = Sitemap::create();

    // Add static URLs
    $sitemap->add(Url::create('/'));
    $sitemap->add(Url::create('/products'));
    $sitemap->add(Url::create('/gallery'));

    // Add product URLs dynamically
    $products = App\Models\product::all();
    foreach ($products as $product) {
        $sitemap->add(Url::create("/product/{$product->name}")
            ->setLastModificationDate($product->updated_at)
            ->setPriority(0.9));
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));

    return response()->file(public_path('sitemap.xml'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
//route for D:\Innova Solutions\flex-house-filament\resources\views\pages\blog-details.blade.php
Route::get('/blog-details', function () {
    return view('pages.blog-details');
})->name('blog.details');


Route::get('/membership-payments/{id}', function ($id) {
    $payment = MembershipPayment::with('user')->findOrFail($id);
    return view('membership.show', compact('payment'));
})->name('membership.show');

Route::get('/order-receipt/{id}', function ($id) {
    $receipt = \App\Models\Order::with('order_product')->findOrFail($id);
    return view('pages.receipt_view', compact('receipt'));
})->name('receipt.show');

//route for resources\views\pages\product-details.blade.php
Route::get('/product-details/{id}',[OrderController::class, 'Order_details'] );



