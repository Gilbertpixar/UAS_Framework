<?php

// use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RostersController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\NewsController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route group for dashboard with "dashboard" prefix
Route::prefix('dashboard')->middleware('auth')->group(function () {
    // Dashboard index route
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    // Categories routes under the dashboard
    Route::prefix('categories')->group(function () {
        // Categories index route
        Route::get('/', [CategoryController::class, 'index'])->name('dashboard.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('dashboard.categories.store');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('dashboard.categories.show');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
    });

    // Route::resource handles all the appointments routes automatically
    Route::resource('appointments', AppointmentsController::class);
    Route::resource('rosters', RostersController::class);
});


Route::get('/services', function () {
    $pageTitle = "Our Services"; // Inisialisasi variabel $pageTitle
    $categories = \App\Models\Category::latest()->paginate(5);
    return view('services', compact('pageTitle', 'categories'));
})->name('services'); // Berikan nama rute 'services' pada rute ini


Route::post('/welcome', [LoginController::class, 'authenticate']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/news', [App\Http\Controllers\HomeController::class, 'news'])->name('news');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
