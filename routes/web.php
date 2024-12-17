<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AproductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryCustomFieldController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/test-email', function () {
    Mail::raw('This is a test email from your Laravel application.', function ($message) {
        $message->to('sm.rakib.773@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});

Route::middleware(['web'])->group(function () {
//Home page route
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');

Route::get('/terms',[HomeController::class, 'terms'])->name('terms');
Route::get('/privacy',[HomeController::class, 'privacy'])->name('privacy');
Route::get('/support',[HomeController::class, 'support'])->name('support');

//product
Route::get('/products',[ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');



Route::get('/checkout', [OrderController::class, 'showCheckoutPage'])->name('checkout.page');
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');
Route::get('/order/failure', [OrderController::class, 'failure'])->name('order.failure');

// Existing routes remain unchanged
Route::post('/checkout/cod', [OrderController::class, 'processCOD'])->name('checkout.cod');


Route::get('/cities/{countryId}', [OrderController::class, 'getCities'])->name('cities');


//services
Route::get('/services',[ServicesController::class, 'index'])->name('services');
Route::get('/digital-menu-board', [ServicesController::class, 'digitalMenuBoard'])->name('services.dMB');
Route::get('/google-review-card', [ServicesController::class, 'googleReviewCard'])->name('services.gRC');
Route::get('/nfc-business-card', [ServicesController::class, 'nfcBusinessCard'])->name('services.nfc');
Route::get('/qr-menu-restaurant-pos', [ServicesController::class, 'qrMenuRestaurantPos'])->name('services.qrPos');

 

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth','verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //contacts
    Route::get('/contacts', [AdminController::class, 'showContacts'])->name('contacts.index'); // Show all contact messages
    Route::get('/contacts/{id}', [AdminController::class, 'viewContact'])->name('contacts.view'); // View a specific contact message
    Route::post('/contacts/{id}/reply', [AdminController::class, 'replyContact'])->name('contacts.reply'); // Reply to a specific contact message

    // Product Management Routes
    Route::get('/products', [AproductController::class, 'index'])->name('products.index'); // Show all products
    Route::get('/products/create', [AproductController::class, 'create'])->name('products.create'); // Add product page
    Route::post('/products', [AproductController::class, 'store'])->name('products.store'); // Add product action
    Route::get('/products/{id}', [AproductController::class, 'show'])->name('products.show'); // Show single product
    Route::get('/products/{id}/edit', [AproductController::class, 'edit'])->name('products.edit'); // Edit product page
    Route::put('/products/{id}', [AproductController::class, 'update'])->name('products.update'); // Update product action
    Route::delete('/products/{id}', [AproductController::class, 'destroy'])->name('products.destroy'); // Delete product


    //category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index'); // Show all categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Add category page
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store'); // Add category action
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show'); // Show single category
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); // Edit category page
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update'); // Update category action
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy'); // Delete category

    //category custom field
    Route::get('/category-custom-fields', [CategoryCustomFieldController::class, 'index'])->name('categoryCustomFields.index'); // List all custom fields
    Route::get('/category-custom-fields/create', [CategoryCustomFieldController::class, 'create'])->name('categoryCustomFields.create'); // Add custom field page
    Route::post('/category-custom-fields', [CategoryCustomFieldController::class, 'store'])->name('categoryCustomFields.store'); // Add custom field action
    Route::get('/category-custom-fields/{id}', [CategoryCustomFieldController::class, 'show'])->name('categoryCustomFields.show'); // Show single custom field
    Route::get('/category-custom-fields/{id}/edit', [CategoryCustomFieldController::class, 'edit'])->name('categoryCustomFields.edit'); // Edit custom field page
    Route::put('/category-custom-fields/{id}', [CategoryCustomFieldController::class, 'update'])->name('categoryCustomFields.update'); // Update custom field action
    Route::delete('/category-custom-fields/{id}', [CategoryCustomFieldController::class, 'destroy'])->name('categoryCustomFields.destroy'); // Delete custom field

    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order-history');

    // Route to show details of a specific order
    Route::get('/order-history/{order}', [OrderHistoryController::class, 'show'])->name('order-details');

    Route::get('shipping', [ShippingController::class, 'index'])->name('shipping.index');
    Route::get('shipping/create-country', [ShippingController::class, 'createCountry'])->name('shipping.createCountry');
    Route::post('shipping/store-country', [ShippingController::class, 'storeCountry'])->name('shipping.storeCountry');
    Route::get('shipping/edit-country/{country}', [ShippingController::class, 'editCountry'])->name('shipping.editCountry');
    Route::put('shipping/update-country/{country}', [ShippingController::class, 'updateCountry'])->name('shipping.updateCountry');
    Route::delete('shipping/delete-country/{country}', [ShippingController::class, 'destroyCountry'])->name('shipping.destroyCountry');
    
    Route::get('shipping/{country}/add-city', [ShippingController::class, 'showAddCityForm'])->name('shipping.addCity');
    Route::post('shipping/{country}/add-city', [ShippingController::class, 'addCity'])->name('shipping.storeCity');
    
// Store or update the shipping charge

// Show form to add a shipping charge
Route::get('shipping/{country}/add-shipping-charge', [ShippingController::class, 'showAddShippingChargeForm'])->name('shipping.addShippingCharge');

Route::post('shipping/{country}/add-shipping-charge', [ShippingController::class, 'addShippingCharge'])->name('shipping.storeShippingCharge');

Route::put('shipping/{country}/update-shipping-charge', [ShippingController::class, 'updateShippingCharge'])->name('shipping.updateShippingCharge');

});

require __DIR__.'/auth.php';
