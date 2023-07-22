<?php
// use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->withoutMiddleware('auth');


Route::get('/services', function () {
    // Get categories
    $categories = \App\Models\Category::latest()->paginate(5);

    // Render view "services" with categories data
    return view('services', compact('categories'));
})->name('services');

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
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
    });
});


Auth::routes();

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
