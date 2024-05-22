<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController\HomeController;
use App\Livewire\Auth\Providers;
use App\Http\Controllers\UserController\DashBoardController;
use App\Livewire\UserFormInfo;
use App\Livewire\VerifyUserContant;


Route::get('/', [HomeController::class, 'index'])->name('index');

// PROVIDERS ROUTERS
// GOOGLE AUTH PROVIDER ROUTER
Route::get('/auth/{provider}/redirect', [Providers::class, 'redirectProvider']);
Route::get('/auth/{provider}/callback', [Providers::class, 'handleProviderCallback']);

// LINKEDIN AUTH PROVIDER ROUTER
Route::get('/auth/{provider}/redirect', [Providers::class, 'redirectProvider']);
Route::get('/auth/{provider}/callback', [Providers::class, 'handleProviderCallback']);



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
	Route::post('/dashboard/submit_user_info', [UserFormInfo::class, 'submit_user_info'])->name('post_request_user_info');
	Route::post('/dashboard/submit_contact_status', [VerifyUserContant::class, 'saveDetails'])->name('post_request_contact_verify_status');
});
