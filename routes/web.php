<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\BlogController as PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.index');
})->name('home');

Route::get('/about', function () {
    return view('guest.about');
})->name('about');

Route::get('/services', function () {
    return view('guest.services');
})->name('services');

// Route For Blogs.....
Route::get('/blogs', [PostController::class, 'index'])->name('blogs');
Route::get('/blogs/tag/{slug}', [PostController::class, 'blogsByTag'])->name('blogs.byTag');
Route::get('/blog-details/{slug}', [PostController::class, 'blogDetails'])->name('blog.details');
Route::post('/blog/{blog}/comment', [PostController::class, 'storeComment'])->name('comments.store');

Route::get('/team', function () {
    return view('guest.team');
})->name('team');

Route::get('/team-details', function () {
    return view('guest.team-details');
})->name('team-details');

Route::get('/web-designing', function () {
    return view('guest.web-designing');
})->name('web-designing');

Route::get('/content-engineering', function () {
    return view('guest.content-engineering');
})->name('content-engineering');

Route::get('/error', function () {
    return view('guest.error');
})->name('error');

Route::post('/send-inquiry', [InquiryController::class, 'store'])->name('send.inquiry');

Route::get('/contactus', [ContactController::class, 'index'])->name('contact.index');
Route::post('/store_contacts', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', function () {
    return view('guest.projects');
})->name('projects');
Route::get('/project-details', function () {
    return view('guest.project-details');
})->name('project-details');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Route For inquiries.....
    Route::get('/all-contacts', [EnquiryController::class, 'contacts'])->name('admin.inquiries.contacts');
    Route::get('/all-promotional-enquries', [EnquiryController::class, 'promotionalEnquries'])->name('admin.inquiries.promotional');
    Route::get('/all-general-enquries', [EnquiryController::class, 'generalEnquries'])->name('admin.inquiries.general');

    // Route For Tag......
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/tags/manage', [TagController::class, 'storeOrUpdate'])->name('tags.manage');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::patch('/tags/{id}/status', [TagController::class, 'updateStatus'])->name('tags.status');

    // Route For Category......
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/manage', [CategoryController::class, 'storeOrUpdate'])->name('categories.manage');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::patch('/categories/{id}/status', [CategoryController::class, 'updateStatus'])->name('categories.status');

    // Route For Blogs.....
    Route::get('/all-blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/add-blog/{id?}', [BlogController::class, 'createOrEdit'])->name('blogs.add');
    Route::post('/add-blog/{id?}', [BlogController::class, 'storeOrUpdate'])->name('blogs.storeOrUpdate');
    Route::get('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');
    Route::patch('/blog/{id}/status', [BlogController::class, 'updateStatus'])->name('blogs.status');

    // CKEditor Image Upload
    Route::post('/upload-image', [EditorUploadController::class, 'store'])->name('ckeditor.upload');
});




require __DIR__ . '/auth.php';
