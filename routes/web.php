<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Web\Auth\ConfirmPasswordController;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Auth\VerificationController;
use App\Http\Controllers\Web\EventsController;
use App\Http\Controllers\Web\ForumController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\StaticController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticController::class, 'home'])->name('home');
Route::get('/awards', [StaticController::class, 'awards'])->name('static.awards');
Route::any('/partners', [StaticController::class, 'partners'])->name('static.partners');
Route::get('/faq', [StaticController::class, 'faq'])->name('static.faq');
Route::get('/users', [StaticController::class, 'users'])->name('static.users');
Route::get('/pages/{slug}', [StaticController::class, 'single'])->name('static.single')->where('slug','^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$');

Route::get('support', [StaticController::class,'support'])->name('support');
Route::post('support', [StaticController::class,'sendMsg'])->name('support.sendmsg');

Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'single'])->name('single')->where('slug','^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$');
});

Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
    Route::get('/', [EventsController::class, 'index'])->name('index');
    Route::get('/{slug}', [EventsController::class, 'single'])->name('single')->where('slug','^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$');
});

Route::group(['prefix' => 'forum', 'as' => 'forum.'], function () {
    Route::get('/', [ForumController::class, 'index'])->name('index');
    Route::get('/{slug}', [ForumController::class, 'threads'])->name('threads')->where('slug','^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$');
    Route::get('/topic/{topicId}', [ForumController::class, 'topic'])->name('topic')->where('id', '[\d]+$');
    Route::post('/topic/{topicId}/create-post', [ForumController::class, 'createPost'])->name('create-post')->where('id', '[\d]+$');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('{id}', [UsersController::class, 'profile'])->where('id','[\d]+$')->name('profile');
    Route::get('{id}/questionnaire', [UsersController::class, 'questionnaire'])->where('id','[\d]+$')->name('questionnaire');
    Route::get('{id}/subscriptions', [UsersController::class, 'subscriptions'])->where('id','[\d]+$')->name('subscriptions');
    Route::get('{id}/subscribers', [UsersController::class, 'subscribers'])->where('id','[\d]+$')->name('subscribers');
    Route::get('{id}/awards', [UsersController::class, 'awards'])->where('id','[\d]+$')->name('awards');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['prefix' => 'tech', 'as' => 'tech.'], function () {
    Route::get('db-sync', function () {
        Artisan::call('migrate');
        dd('База данных обновлена');
    });
    Route::get('create-storage', function () {
        Artisan::call('storage:link');
        dd('Ярлык создан');
    });
});

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
});

// NEED FIX
Route::delete('/nova-api/nova-settings/{path}/field/{fieldName}', 'OptimistDigital\NovaSettings\Http\Controllers\SettingsController@deleteImage');
