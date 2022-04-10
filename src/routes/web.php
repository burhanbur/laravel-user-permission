<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\PermissionController;
use App\Http\Controllers\Web\RoleController;
use App\Http\Controllers\Web\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function() {	
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
	Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::group(['middleware' => ['role:super-admin']], function() {
		// users
		Route::get('manage-users', [UserController::class, 'index'])->name('manage-users');
		Route::get('manage-admins', [UserController::class, 'admin'])->name('manage-admins');
		Route::get('show-user/{id}', [UserController::class, 'show'])->name('show.user');
		Route::get('create-user', [UserController::class, 'create'])->name('create.user');
		Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
		// Route::get('edit-password/{id}', [UserController::class, 'editPassword'])->name('edit.password');
		Route::post('store-user', [UserController::class, 'store'])->name('store.user');
		Route::put('update-user/{id}', [UserController::class, 'update'])->name('update.user');
		Route::delete('delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

		// roles
		Route::get('manage-roles', [RoleController::class, 'index'])->name('manage-roles');
		Route::get('show-role/{id}', [RoleController::class, 'show'])->name('show.role');
		Route::get('create-role', [RoleController::class, 'create'])->name('create.role');
		Route::get('edit-role/{id}', [RoleController::class, 'edit'])->name('edit.role');
		Route::post('store-role', [RoleController::class, 'store'])->name('store.role');
		Route::put('update-role/{id}', [RoleController::class, 'update'])->name('update.role');
		Route::delete('delete-role/{id}', [RoleController::class, 'destroy'])->name('delete.role');

		// permissions
		Route::get('manage-permissions', [PermissionController::class, 'index'])->name('manage-permissions');
		Route::get('show-permission/{id}', [PermissionController::class, 'show'])->name('show.permission');
		Route::get('create-permission', [PermissionController::class, 'create'])->name('create.permission');
		Route::get('edit-permission/{id}', [PermissionController::class, 'edit'])->name('edit.permission');
		Route::post('store-permission', [PermissionController::class, 'store'])->name('store.permission');
		Route::put('update-permission/{id}', [PermissionController::class, 'update'])->name('update.permission');
		Route::delete('delete-permission/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');
	});

	Route::group(['middleware' => ['role:branch-admin']], function() {

	});

	Route::group(['middleware' => ['role:user']], function() {
		// profile
		Route::get('profile', [UserController::class, 'profile'])->name('profile');
		Route::get('edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
		Route::put('update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
	});
});