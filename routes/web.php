<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\MandalController;
use App\Http\Controllers\Admin\MandalMemberController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\FrontController;

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('/search-listings', 'searchListings')->name('search.listings');

    Route::get('/about-us', 'about')->name('about');

    Route::get('/contact-us', 'contact')->name('contact');

    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');

    Route::get('/faq', 'faq')->name('faq');

    Route::get('/blogs', 'blogs')->name('blogs');

    Route::get('/blog/{slug}', 'blogDetail')->name('blog.detail');

    Route::get('/listing', 'listing')->name('listing');

    Route::get('/privacy-policy', 'privacy')->name('privacy');

    Route::get('/terms-and-conditions', 'terms')->name('terms');

    Route::get('/mandal-members', 'mandalMembers')->name('mandal.members');

    Route::get('/member-enquiry', 'memberEnquiry')->name('member.enquiry');

    Route::get('/why-us', 'whyUs')->name('why.us');

    Route::post('/submit-listing', 'submitListing')->name('listing.submit');

    Route::post('/member-enquiry', 'submitMandalMember')->name('member.enquiry.store');

    Route::post('/contact-submit', 'submitContact')->name('contact.submit');

});

// Admin Routes list
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profile-setting', ProfileSettingController::class);
        Route::post('/resetpassword', [ProfileSettingController::class, 'resetPassword'])->name('reset.password');

        Route::resource('locations', LocationController::class);

        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class)->names('subcategories');

        Route::resource('mandals', MandalController::class)->names('mandals');

        Route::resource('listings', ListingController::class);
        Route::get('get-subcategories/{category_id}', [ListingController::class, 'getSubCategories'])->name('get.subcategories');

        Route::resource('mandal-members', MandalMemberController::class)->names('mandal-members');

        Route::resource('faqs', FaqController::class)->names('faqs');

        Route::resource('blogs', BlogController::class)->names('blogs');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        Route::get('/settings', [SettingController::class, 'edit'])
            ->name('settings.edit');

        Route::post('/settings', [SettingController::class, 'update'])
            ->name('settings.update');


        Route::get('/logout', [LogoutController::class, 'logout']);

    });
});
