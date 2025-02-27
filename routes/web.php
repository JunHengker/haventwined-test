<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/terms', function () {
    return Inertia::render('Terms');
});

Route::get('/policy', function () {
    return Inertia::render('Policy');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/create', [EventController::class, 'store']);
    Route::post('/update/{id}', [EventController::class, 'update']);
    Route::post('/delete', [EventController::class, 'destroy']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/company/create', [CompanyController::class, 'store']);
    Route::post('/company/update/{id}', [CompanyController::class, 'update']);
    Route::post('/company/delete', [CompanyController::class, 'destroy']);
});

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/edit', function () {
    return Inertia::render('CMS/Edit');
})->middleware(['auth', 'verified'])->name('edit');

Route::get('/company', function () {
    return Inertia::render('CMS/Company');
})->middleware(['auth', 'verified'])->name('company');
