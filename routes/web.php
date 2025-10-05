<?php

use Illuminate\Support\Facades\Route;

// FRONTEND CONTROLLERS
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\TeamController as FrontTeamController;
use App\Http\Controllers\Website\ServicesController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\BlogFrontendController;
use App\Http\Controllers\Website\PortfolioController;

// AUTH / ADMIN CONTROLLERS
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\BlogController;
use App\Http\Controllers\AdminPanel\ContactRequestController;
use App\Http\Controllers\AdminPanel\PortfolioCategoryController;
use App\Http\Controllers\AdminPanel\ProjectController;
use App\Http\Controllers\AdminPanel\TeamInfoController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public Team page
Route::get('/team', [FrontTeamController::class, 'index'])->name('team');

// Service page
Route::get('/service-details', [ServicesController::class, 'details'])->name('service.details');

// Contact page
Route::get('/contact-us', fn() => view('website.contact.index'))->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Blog pages
Route::get('/blog', [BlogFrontendController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogFrontendController::class, 'show'])->name('blog.show');

// Portfolio pages
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.detail');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL ROUTES (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('admin-panel.dashboard'))->name('dashboard');

    // Blog Management
    Route::resource('categories', CategoryController::class);
    Route::resource('blogs', BlogController::class);
    Route::post('/blogs/{blog}/toggle-publish', [BlogController::class, 'togglePublish'])->name('blogs.toggle-publish');

    // Contact Requests
    Route::get('/admin/contacts', [ContactRequestController::class, 'index'])->name('admin.contacts.index');

    // Portfolio Management
    Route::resource('portfolio-categories', PortfolioCategoryController::class);
    Route::resource('projects', ProjectController::class);

    /*
    |--------------------------------------------------------------------------
    | ADMIN TEAM MODULE
    |--------------------------------------------------------------------------
    | All admin team routes under /admin/team
    */
// Inside Route::middleware('auth')->group(function () {

// Team Management Routes
// In your web.php file
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/team', [TeamInfoController::class, 'index'])->name('team.index');
    Route::get('/team/create', [TeamInfoController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamInfoController::class, 'store'])->name('team.store');
    Route::get('/team/{team}/edit', [TeamInfoController::class, 'edit'])->name('team.edit');
    Route::put('/team/{team}', [TeamInfoController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}', [TeamInfoController::class, 'destroy'])->name('team.destroy'); // This is the destroy route
    Route::post('/team/reorder', [TeamInfoController::class, 'reorder'])->name('team.reorder');
    Route::post('/team/{team}/toggle-status', [TeamInfoController::class, 'toggleStatus'])->name('team.toggle-status');
    Route::post('/team/{team}/remove-image', [TeamInfoController::class, 'removeImage'])->name('team.remove-image');// Add this route for level updates
    Route::post('/team/{team}/update-level', [TeamInfoController::class, 'updateLevel'])->name('team.update-level');
});

});
