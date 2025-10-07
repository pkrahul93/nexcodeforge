<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
Route::any('pass',
function () {
        $arrData = [];
         //$str = "bE#XD49US32["; //old - "abhui9@kji5";
        //$str = "r@mt#JQp686"; //"jngGtrjn@5335dfmn";
         $str = "Admin@123";
        
        $arrData['bcrypt'] = bcrypt($str);
        
        dd($arrData);
    });
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
    Route::get('/manage-tag', [TagController::class, 'create'])->name('tags.create');
    Route::post('/store-tag', [TagController::class, 'store'])->name('tags.store');
    Route::get('/all-tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/edit-tag/{id}', [TagController::class, 'edit'])->name('tags.edit');
    Route::post('/update-tag/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::get('/delete-tag/{id}', [TagController::class, 'destroy'])->name('tags.delete');

    // Route For Category......
    Route::get('/manage-category', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/all-categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    // Route For Blogs.....
    Route::get('/all-blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/add-blog', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::get('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

    // CKEditor Image Upload
    Route::post('/upload-image', [EditorUploadController::class, 'store'])->name('ckeditor.upload');
});




require __DIR__.'/auth.php';
