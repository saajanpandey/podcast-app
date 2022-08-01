<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PodcastController;
use App\Models\Podcast;
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
    return redirect('/system/login');
});
// Route::get('/', function () {
//     return view('admin.dashboard');
// });
Route::group(['prefix' => 'system'], function () {
    Route::get('/login', [AdminLoginController::class, 'getLogin'])->name('login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login');

    Route::group(['middleware' => 'auth:admin'], function ($route) {
        $route->view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
        $route->get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        $route->get('/change-password', [ChangePasswordController::class, 'changeForm'])->name('changepassword.form');
        $route->post('/change-password', [ChangePasswordController::class, 'store'])->name('changepassword.store');
        $route->resource('/podcasts', PodcastController::class);
        $route->post('/image/upload/{id}', [PodcastController::class, 'updateImage'])->name('podcast.image');
        $route->post('/audio/upload/{id}', [PodcastController::class, 'updateAudio'])->name('podcast.audio');
        $route->get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
        $route->resource('/category', CategoryController::class);
    });
});
