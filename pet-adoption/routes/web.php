<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User Dashboard Route
Route::get('/user/dashboard', function () {
    if (auth()->user()->role !== 'user') {
        return redirect('/admin/dashboard');
    }
    return view('user.dashboard.dashboard');
})->middleware('auth')->name('user.dashboard');

// Admin Dashboard Route
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard.dashboard');
    })->name('dashboard');
});

// User routes
Route::get('/user/pages/about', [UserController::class, 'about'])->name('user.pages.about');
Route::get('/user/pages/support', [UserController::class, 'support'])->name('user.pages.support');
Route::get('/user/pages/faq', [UserController::class, 'faq'])->name('user.pages.faq');
Route::get('/user/pages/pets', [UserController::class, 'pets'])->name('user.pages.pets'); // Ensure this route is correctly defined
Route::get('/user/pages/contact', [UserController::class, 'contact'])->name('user.pages.contact');

// Admin routes
Route::get('/admin/manage_pet', [AdminPagesController::class, 'managePet'])->name('admin.pages.manage_pet');
Route::get('/admin/notification', [AdminPagesController::class, 'notification'])->name('admin.pages.notification');
Route::get('/admin/report', [AdminPagesController::class, 'report'])->name('admin.pages.report');
Route::get('/admin/pet_document', [AdminPagesController::class, 'petDocument'])->name('admin.pages.pet_document');

// Pet routes
Route::get('/admin/pets', [PetController::class, 'index'])->name('admin.pets.index');
Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('admin.pets.edit');
Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('admin.pets.delete');
Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');
Route::get('/admin/add', [PetController::class, 'create'])->name('admin.pets.add');
Route::post('/admin/pets', [PetController::class, 'store'])->name('admin.pets.store');
Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
Route::get('/pets/{pet}', [PetController::class, 'show'])->name('pets.view');
Route::get('/admin/pets/{pet}', [PetController::class, 'show'])->name('admin.pets.view');

Route::get('/admin/adoption-form', [AdoptionController::class, 'showForm'])->name('adoption.form');
Route::post('/admin/adoption-form', [AdoptionController::class, 'submitForm'])->name('adoption.submit');
Route::get('/admin/adoption-document/{pet_id}', [AdoptionController::class, 'showDocument'])->name('adoption.document');