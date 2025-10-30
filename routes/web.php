<?php
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

Route::prefix('admin')->middleware([\App\Http\Middleware\usercheck::class])->group(function()
{
    Route::get('dashbord',[Admincontroller::class,'dashboard'])->name('admin.dashboard');
    Route::post('logout',[Admincontroller::class,'login'])->name('admin.logout');
});



Route::get('/posts', [blogcontroller::class, 'index'])->name('posts.index');


Route::get('/registration', [blogcontroller::class, 'showform'])->name('registration');
Route::post('/registration', [blogcontroller::class, 'registration'])->name('registrations.submit');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', function() {
    return view('login');
})->name('login');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::post('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/dashboard', [PostController::class, 'dashboard'])->name('posts.dashboard');
Route::post('/dashboard', [PostController::class, 'dashboard'])->name('posts.dashboard');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::post('/post/{post}/like', [ActionController::class, 'like'])->name('post.like');
Route::post('/post/{post}/comments', [ActionController::class, 'comment'])->name('post.comment');
Route::post('/post/{post}/share', [ActionController::class, 'share'])->name('post.share');
Route::get('/post/{post}/download', [ActionController::class, 'download'])->name('post.download');


Route::get('/admin/login', function () {
    return view('admin');
})->name('admin');


Route::post('/admin', function (Request $request) {
    
    $email = 'Sangeetharoka41@gmail.com';
    $password = '123123123';

    if ($request->email === $email && $request->password === $password) {
    
        session(['is_admin' => true]);
        return redirect('/admin/dashboard');
    } else {
        return back()->with('error', 'Invalid credentials');
    }
})->name('admin');

Route::get('/admin/dashboard', function () {
   
    if (!session('is_admin')) {
        abort(403, 'Unauthorized Access');
    }
    return view('admin.dashboard');
})->name('admin.dashboard');


Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect('/admin');
})->name('admin.logout');


