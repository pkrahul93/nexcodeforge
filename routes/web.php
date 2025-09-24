<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('guest.index');})->name('home');

Route::get('/about', function () {return view('guest.about');})->name('about');

Route::get('/services', function () {return view('guest.services');})->name('services');

Route::get('/blogs', function () {return view('guest.blog');})->name('blogs');

Route::get('/blog-details', function () {return view('guest.blog-details');})->name('blog-details');

Route::get('/team', function () {return view('guest.team');})->name('team');

Route::get('/team-details', function () {return view('guest.team-details');})->name('team-details');

Route::get('/web-designing', function () {return view('guest.web-designing');})->name('web-designing');

Route::get('/content-engineering', function () {return view('guest.content-engineering');})->name('content-engineering');

Route::get('/error', function () {return view('guest.error');})->name('error');

Route::post('/send-inquiry', [InquiryController::class, 'store'])->name('send.inquiry');

Route::get('/contactus', [ContactController::class, 'index'])->name('contact.index');
Route::post('/store_contacts', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', function () {return view('guest.projects');})->name('projects');
Route::get('/project-details', function () {return view('guest.project-details');})->name('project-details');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
