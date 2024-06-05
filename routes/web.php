<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TechnologyController;
use App\Models\Lead;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Controller\ErrorController;

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


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Put all the routes that needs to be protected by our authentication system
        // All routes needs to share a common name and prefix and the middleware

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/welcome', [DashboardController::class, 'homepage'])->name('welcome');
        Route::resource('/projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        Route::resource('/types', TypeController::class)->parameters(['types' => 'type:slug']);
        Route::resource('/technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mailable', function () {
    $lead = App\Models\Lead::find(1);

    return new App\Mail\NewLeadMessage($lead);
});

require __DIR__ . '/auth.php';
