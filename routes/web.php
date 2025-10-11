<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\BlogController as PostController;
use App\Http\Controllers\EnquiryController as EnqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupportController;
use App\Models\Enquiry;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::any(
    'pass',
    function () {
        $arrData = [];
        //$str = "bE#XD49US32["; //old - "abhui9@kji5";
        //$str = "r@mt#JQp686"; //"jngGtrjn@5335dfmn";
        $str = "Admin@123";

        $arrData['bcrypt'] = bcrypt($str);

        dd($arrData);
    }
);
// Route::get('/', function () {
//     return view('guest.index');
// })->name('home');




Route::get('/about', function () {
    return view('guest.about');
})->name('about');

Route::get('/services', function () {
    return view('guest.services');
})->name('services');

// Route For Blogs.....
Route::get('/blogs', [PostController::class, 'index'])->name('blogs');
Route::get('/blogs/tag/{slug}', [PostController::class, 'blogsByTag'])->name('blogs.byTag');
Route::get('/blogs/category/{slug}', [PostController::class, 'blogsByCategory'])->name('blogs.byCategory');
Route::get('/blog-details/{slug}', [PostController::class, 'blogDetails'])->name('blog.details');
Route::post('/blog/{blog}/comment', [PostController::class, 'storeComment'])->name('comments.store');
Route::get('/blogs/search', [PostController::class, 'search'])->name('blogs.search');

// Route For Home Page...
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/promotions/cookie', [HomeController::class, 'setCookie'])->name('home.cookie');



Route::get('/team', function () {
    return view('guest.team');
})->name('team');

Route::get('/team-details', function () {
    return view('guest.team-details');
})->name('team-details');

// Routes For Multiple Pages....
Route::get('/web-designing', function () {
    return view('guest.web-designing');
})->name('web-designing');

Route::get('/content-engineering', function () {
    return view('guest.content-engineering');
})->name('content-engineering');

Route::get('/digital-marketing', function () {
    return view('guest.digital-marketing');
})->name('digital-marketing');

Route::get('/creative-design', function () {
    return view('guest.creative-design');
})->name('creative-design');

Route::get('/maintenance-support', [SupportController::class, 'index'])->name('maintenance-support');
Route::post('/support/ticket', [SupportController::class, 'store'])->name('support-ticket.store');


Route::get('/web-redesigning', function () {
    return view('guest.web-redesigning');
})->name('web-redesigning');

Route::get('/privacy-policy', function () {
    return view('guest.privacy-policy');
})->name('privacy-policy');

Route::get('/refund-policy', function () {
    return view('guest.refund-policy');
})->name('refund-policy');

Route::get('/terms-conditions', function () {
    return view('guest.terms-conditions');
})->name('terms-conditions');

Route::get('/cookie-policy', function () {
    return view('guest.cookie-policy');
})->name('cookie-policy');

Route::get('/disclaimer', function () {
    return view('guest.disclaimer');
})->name('disclaimer');

Route::get('/faq', function () {
    return view('guest.faq');
})->name('faq');

Route::get('/careers', function () {
    return view('guest.careers');
})->name('careers');

Route::get('/error', function () {
    return view('guest.error');
})->name('error');

Route::get('/under-construction', function () {
    return view('guest.under-construction');
})->name('under-construction');

Route::post('/send-inquiry', [InquiryController::class, 'store'])->name('send.inquiry');

// Routes For Contact Page......
Route::get('/contactus', [ContactController::class, 'index'])->name('contact.index');
Route::post('/store_contacts', [ContactController::class, 'store'])->name('contact.store');

// Routes For Enquiry Page......
Route::get('/enquiry', [EnqController::class, 'index'])->name('enquiry.index');
Route::post('/enquiry', [EnqController::class, 'store'])->name('enquiry.store');

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

    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('admin.enquiries.index');
    Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('admin.enquiries.show');
    Route::patch('/enquiries/{id}/status', [EnquiryController::class, 'updateStatus'])->name('admin.enquiries.status');

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

    // Route For Comments.....
    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::patch('comments/{id}/status', [CommentController::class, 'updateStatus'])->name('comments.updateStatus');

    // CKEditor Image Upload
    Route::post('/upload-image', [EditorUploadController::class, 'store'])->name('ckeditor.upload');

    // Routes for Promotions Management
    Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
    Route::get('/manage-promotion/{id?}', [PromotionController::class, 'createOrEdit'])->name('promotions.manage');
    Route::post('/manage-promotion/{id?}', [PromotionController::class, 'storeOrUpdate'])->name('promotions.storeOrUpdate');
    Route::delete('/promotions/{id}', [PromotionController::class, 'destroy'])->name('promotions.destroy');
    Route::patch('/promotions/{id}/status', [PromotionController::class, 'updateStatus'])->name('promotions.status');

    // Routes For Support Ticket & Requests...
    Route::get('/all-tickets', [SupportTicketController::class, 'index'])->name('support.tickets');
    Route::get('/pending-tickets', [SupportTicketController::class, 'pendingTickets'])->name('support.pending-tickets');
    Route::get('/resolved-tickets', [SupportTicketController::class, 'resolvedTickets'])->name('support.resolved-tickets');
    Route::get('/ticket/{id}', [SupportTicketController::class, 'showTicket'])->name('tickets.show');
    Route::post('/support-tickets/{id}/status', [SupportTicketController::class, 'updateStatus'])->name('tickets.updateStatus');
    Route::delete('/support-tickets/{id}', [SupportTicketController::class, 'destroy'])->name('tickets.delete');
});




require __DIR__ . '/auth.php';
