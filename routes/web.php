<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes (protected by admin middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Leaders
    Route::apiResource('leaders', \App\Http\Controllers\Admin\LeaderController::class);

    // Visions
    Route::apiResource('visions', \App\Http\Controllers\Admin\VisionController::class);

    // Branches
    Route::apiResource('branches', \App\Http\Controllers\Admin\BranchController::class);

    // Message Years
    Route::apiResource('message-years', \App\Http\Controllers\Admin\MessageYearController::class);

    // Message Categories
    Route::apiResource('message-categories', \App\Http\Controllers\Admin\MessageCategoryController::class);

    // Series
    Route::apiResource('series', \App\Http\Controllers\Admin\SeriesController::class);

    // Messages
    Route::apiResource('messages', \App\Http\Controllers\Admin\MessageController::class);

    // Podcasts
    Route::apiResource('podcasts', \App\Http\Controllers\Admin\PodcastController::class);

    // Products
    Route::apiResource('products', \App\Http\Controllers\Admin\ProductController::class);

    // Services
    Route::apiResource('services', \App\Http\Controllers\Admin\ServiceController::class);

    // Newsletter subscribers
    Route::get('/newsletter', [\App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('/newsletter/{newsletter}', [\App\Http\Controllers\Admin\NewsletterController::class, 'destroy'])->name('newsletter.destroy');

    // Contact messages
    Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');

    // Streams
    Route::apiResource('streams', \App\Http\Controllers\Admin\StreamController::class);

    // Team Members
    Route::apiResource('team-members', \App\Http\Controllers\Admin\TeamMemberController::class);
});

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/download', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download.index');
Route::get('/download/{year}', [\App\Http\Controllers\DownloadController::class, 'year'])->name('download.year');
Route::get('/download/{year}/podcasts', [\App\Http\Controllers\DownloadController::class, 'podcastsYear'])->name('download.year.podcasts');
Route::get('/messages/{message:slug}', [\App\Http\Controllers\DownloadController::class, 'show'])->name('messages.show');
Route::get('/services', [\App\Http\Controllers\ServicePageController::class, 'index'])->name('services');
Route::get('/products', [\App\Http\Controllers\ProductPageController::class, 'index'])->name('products');
Route::get('/podcasts', [\App\Http\Controllers\PodcastPageController::class, 'index'])->name('podcasts');
Route::get('/partnership', [\App\Http\Controllers\PartnershipController::class, 'index'])->name('partnership');
Route::get('/give', [\App\Http\Controllers\GiveController::class, 'index'])->name('give');
Route::get('/team', [\App\Http\Controllers\TeamPageController::class, 'index'])->name('team');

Route::get('/services/{service:slug}', [\App\Http\Controllers\ServicePageController::class, 'show'])->name('services.show');

/*
|--------------------------------------------------------------------------
| Public Form Submissions
|--------------------------------------------------------------------------
*/
Route::post('/newsletter', [\App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/contact', [\App\Http\Controllers\ContactPageController::class, 'submit'])->name('contact.submit');
