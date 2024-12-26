<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Manager\DashboardController as ManagerDashboard;
use App\Http\Controllers\Staff\DashboardController as StaffDashboard;
use App\Http\Controllers\Client\DashboardController as ClientDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Manager\CategoryController as ManagerCategoryController;
use App\Http\Controllers\Manager\MenuController as ManagerMenuController;
use App\Http\Controllers\WelcomeController;

// Remplacer cette route
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Routes par défaut de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route de débogage modifiée
Route::get('/debug-role', function () {
    $user = auth()->user();
    dd([
        'user_id' => $user->id,
        'email' => $user->email,
        'role_id' => $user->role_id,
        'role' => $user->role,
        'role_type' => gettype($user->role),
        'is_admin' => $user->isAdmin(),
        'has_role_admin' => $user->hasRole('admin')
    ]);
})->middleware('auth');

// Routes Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Routes pour la gestion des utilisateurs
    Route::resource('users', UserController::class);

    // Routes pour la gestion des rôles
    Route::resource('roles', RoleController::class);
    //route pour la gestion des categories
    Route::resource('categories', AdminCategoryController::class);
    //route pour la gestion des menus
    Route::resource('menus', AdminMenuController::class);
});

// Routes Manager
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboard::class, 'index'])->name('dashboard');
    Route::resource('categories', ManagerCategoryController::class);
    Route::resource('menus', ManagerMenuController::class);
});

// Routes Staff
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffDashboard::class, 'index'])->name('staff.dashboard');
});

// Routes Client
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientDashboard::class, 'index'])->name('client.dashboard');
});

require __DIR__.'/auth.php';
