<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AdminController;

Route::get('/',function()
{
return view('welcome');
})->name('Welcome');

Route::get('/registration', [BlogController::class, 'showform'])->name('registration');
Route::post('/registration', [BlogController::class, 'registration'])->name('registration.submit');

// Show login form
Route::get('/login', [BlogController::class, 'showLogin'])->name('login');
Route::post('/login', [BlogController::class, 'login'])->name('login.submit');

// User dashboard
Route::get('/dashboard', [PostController::class, 'dashboard'])->name('posts.dashboard');
Route::post('/dashboard', [PostController::class, 'dashboard'])->name('posts.dashboard');

Route::get('/logout', [BlogController::class, 'logout'])->name('logout');

// -------------------- POSTS --------------------
Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/post/{post}/like', [ActionController::class, 'like'])->name('post.like');
Route::post('/post/{post}/comments', [ActionController::class, 'comment'])->name('post.comment');
Route::post('/post/{post}/share', [ActionController::class, 'share'])->name('post.share');
Route::get('/post/{post}/download', [ActionController::class, 'download'])->name('post.download');

// -------------------- ADMIN --------------------
Route::prefix('admin')->group(function () {

    // Admin login form
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    // Admin login submission
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Protected routes (middleware can be added here)
   /*Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });*/
});
 Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
        use App\Http\Controllers\PageController;

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('/blog/publish/{id}', [BlogController::class,'publish'])->name('blog.publish');
Route::get('/blog/unpublish/{id}', [BlogController::class,'unpublish'])->name('blog.unpublish');
Route::get('/blog/delete/{id}', [BlogController::class,'delete'])->name('blog.delete');

   Route::patch('/admin/posts/{post}/approve', [PostsController::class,'approve'])->name('posts.approve');
Route::patch('/admin/posts/{post}/reject', [PostsController::class,'reject'])->name('posts.reject');
