<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about-us', function () {
    return view('pages.about-us');
});
Route::get('/contact-us', function () {
    return view('pages.contact-us');
});
Route::get('/disclaimer', function () {
    return view('pages.disclaimer');
});
Route::get('/faq', function () {
    return view('pages.faq');
});
Route::get('/listing', function () {
    return view('pages.listing');
});
Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
});
Route::get('/terms-and-conditions', function () {
    return view('pages.terms-and-conditions');
});
Route::get('/disclaimer', function () {
    return view('pages.disclaimer');
});
Route::get('/mandal-members', function () {
    return view('pages.mandal-members');
});
Route::get('/member-enquiry', function () {
    return view('pages.member-enquiry');
});
Route::get('/why-us', function () {
    return view('pages.why-us');
});

