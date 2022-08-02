<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ChangePasswordController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\PodcastController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/podcasts', PodcastController::class);

// Route::get('/podcast/download/{id}', [PodcastController::class, 'download']);

Route::group(['prefix' => 'v1'], function ($api) {
    $api->post('/register', [LoginController::class, 'register']);
    $api->post('/login', [LoginController::class, 'login']);

    Route::group(["middleware" => "auth:sanctum"], function ($api) {
        $api->apiResource('/users', UserController::class);
        $api->put('/update/profile', [UserController::class, 'updateProfile']);
        $api->get('/logout', [LoginController::class, 'logout']);
        $api->apiResource('/favourites', FavouriteController::class);
        $api->get('/user-favourite', [FavouriteController::class, 'userFavourite']);
        $api->apiResource('/podcasts', PodcastController::class);
        $api->post('/plays', [PodcastController::class, 'plays']);
        $api->put('/user-image', [UserController::class, 'updateImage']);
        $api->get('/search-podcast', [PodcastController::class, 'search']);
        $api->apiResource('/feedback', FeedbackController::class);
        $api->get('/podcast-list', [PodcastController::class, 'listAll']);
        $api->post('/change-password', [ChangePasswordController::class, 'store']);
        $api->get('/category', [ApiCategoryController::class, 'index']);
        $api->get('/category-podcast', [ApiCategoryController::class, 'podcastList']);
    });
});
