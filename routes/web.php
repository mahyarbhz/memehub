<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("home");

Route::get('/soon', function () {
    return view('soon');
})->name("soon");

Route::get('/dashboard', function () {
    $memes = \App\Models\Meme::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
    return view('dashboard.index', ['memes' => $memes]);
})->middleware(['auth', 'verified'])->name("dashboard");

Route::post('/profileimageupload', [ImageUploadController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name("profile_image_upload");

Route::get('/reloadcaptcha', function () {
    return response()->json(['captcha'=> captcha_img('math')]);
});

// Memes
Route::resource('memes',MemeController::class);

Route::get('/memes/create', [MemeController::class, 'create'])
    ->name('memes.create')
    ->middleware(['auth', 'verified']);

Route::post('/memes/store', [MemeController::class, 'store'])
    ->name('memes.store')
    ->middleware(['auth', 'verified']);

Route::resource('comments',CommentController::class)
    ->middleware(['auth', 'verified']);

// Owners
Route::get('/owners/users', [OwnersController::class, 'users_index'])
    ->middleware(['auth', 'verified', 'role:owner'])
    ->name("owners.users");

Route::get('/users_index_ajax', [OwnersController::class, 'users_index_ajax'])
    ->middleware(['auth', 'verified', 'role:owner']);

Route::get('/owners/users/edit/{id}', [OwnersController::class, 'users_edit'])
    ->middleware(['auth', 'verified', 'role:owner'])
    ->name("owners.uedit");

Route::put('/owners/users/update/{id}', [OwnersController::class, 'users_update'])
    ->middleware(['auth', 'verified', 'role:owner'])
    ->name("owners.uupdate");

    // Categories
    Route::resource('categories',CategoryController::class)
        ->middleware(['auth', 'verified', 'role:owner']);

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name("categories.show");
