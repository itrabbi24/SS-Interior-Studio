<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\TeamController;
use App\Http\Controllers\Website\ServicesController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\BlogFrontendController;
use App\Http\Controllers\Website\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\BlogController;
use App\Http\Controllers\AdminPanel\ContactRequestController;
use App\Http\Controllers\AdminPanel\PortfolioCategoryController;
use App\Http\Controllers\AdminPanel\ProjectController;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Website Pages
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/service-details', [ServicesController::class, 'details'])->name('service.details');
Route::get('/contact-us', function () {
    return view('website.contact.index');
})->name('contact');

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Blog Details
Route::get('/blog', [BlogFrontendController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogFrontendController::class, 'show'])->name('blog.show');

// Contact us
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Portfolio Routes (Frontend)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.detail');

// Admin Panel Routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('admin-panel.dashboard'))->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('blogs', BlogController::class);
    Route::post('/blogs/{blog}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blogs.toggle-publish');
    Route::get('/admin/contacts', [ContactRequestController::class, 'index'])->name('admin.contacts.index');
    
    // Portfolio Categories (Admin)
    Route::resource('portfolio-categories', PortfolioCategoryController::class);
    
    // Projects (Admin) - Make sure this is properly defined
    Route::resource('projects', ProjectController::class);
});