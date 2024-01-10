<?php

use App\Livewire\Counter;
use App\Livewire\Roles\Roles;
use App\Livewire\Roles\EditRoles;
use App\Livewire\Roles\CreateRoles;
use App\Livewire\Roles\DeleteRoles;
use Illuminate\Support\Facades\Route;
use App\Livewire\Permissions\Permissions;
use App\Http\Controllers\ProfileController;
use App\Livewire\Permissions\EditPermissions;
use App\Livewire\Permissions\CreatePermissions;
use App\Livewire\Permissions\DeletePermissions;

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

Route::get('/counter', Counter::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/roles', Roles::class)->name('admin.roles');
    Route::get('/admin/create-roles', CreateRoles::class)->name('admin.create-role');
    Route::get('/admin/edit-roles/{id}', EditRoles::class)->name('admin.edit-role');
    Route::get('/admin/delete-roles/{id}', DeleteRoles::class)->name('admin.delete-role');
    Route::post('/admin/edit-roles/{id}', [EditRoles::class, 'givePermission'])->name('admin.role.permission');

    Route::get('/permissions', Permissions::class)->name('admin.permissions');
    Route::get('/admin/create-permissions', CreatePermissions::class)->name('admin.create-permission');
    Route::get('/admin/edit-permissions/{id}', EditPermissions::class)->name('admin.edit-permission');
    Route::get('/admin/delete-permissions/{id}', DeletePermissions::class)->name('admin.delete-permission');
    Route::post('/admin/edit-permission/{id}', [EditPermissions::class, 'giveRole'])->name('admin.permission.roles');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';