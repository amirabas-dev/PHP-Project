<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

// Dashboard & General Pages
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::get('/charts', [DashboardController::class, 'charts'])->name('charts');
Route::get('/tables', [DashboardController::class, 'tables'])->name('tables');
Route::get('/forms', [DashboardController::class, 'forms'])->name('forms');
Route::get('/components', [DashboardController::class, 'components'])->name('components');
Route::get('/alerts', [DashboardController::class, 'alerts'])->name('alerts');
Route::get('/modals', [DashboardController::class, 'modals'])->name('modals');
Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
Route::get('/blank', [DashboardController::class, 'blank'])->name('blank');
Route::get('/create-agent', [DashboardController::class, 'createAgent'])->name('create-agent');
Route::get('/forgot-password', [DashboardController::class, 'forgotPassword'])->name('password.request');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('500');

// User Management
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Authentication
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
