<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'project', 'controller' => ProjectController::class], function () {
    Route::get('/', 'index')->name('projects.index');
    Route::get('/{project}', 'show')->name('projects.show');
    Route::get('/create', 'create')->name('projects.create');
    Route::get('/edit', 'create')->name('projects.edit');
    Route::post('/', 'store')->name('projects.store');
    Route::put('/{project}', 'update')->name('projects.update');
    Route::delete('/{project}', 'destroy')->name('projects.destroy');
});

Route::group(['controller' => ClientController::class], function () {
    Route::get('/clients', 'index')->name('clients.index');
    Route::get('/clients/create', 'create')->name('clients.create');
    Route::get('/clients/{client}/edit', 'edit')->name('clients.edit');
    Route::post('/clients', 'store')->name('clients.store');
    Route::put('/clients/{client}', 'update')->name('clients.update');
    Route::delete('/clients/{client}', 'destroy')->name('clients.destroy');
});

Route::group(['prefix' => 'task', 'controller' => TaskController::class], function () {
    Route::get('/', 'index')->name('tasks.index');
    Route::get('/{task}', 'show')->name('tasks.show');
    Route::get('/create', 'create')->name('tasks.create');
    Route::get('/edit', 'create')->name('tasks.edit');
    Route::post('/', 'store')->name('tasks.store');
    Route::put('/{task}', 'update')->name('tasks.update');
    Route::delete('/{task}', 'destroy')->name('tasks.destroy');
});

Route::group(['prefix' => 'user', 'controller' => UserController::class], function () {
    Route::get('/', 'index')->name('users.index');
    Route::get('/{user}', 'show')->name('users.show');
    Route::get('/create', 'create')->name('users.create');
    Route::get('/edit', 'create')->name('users.edit');
    Route::post('/', 'store')->name('users.store');
    Route::put('/{user}', 'update')->name('users.update');
    Route::delete('/{user}', 'destroy')->name('users.destroy');
});

Route::group(['prefix' => 'notification', 'controller' => NotificationController::class], function () {
    Route::get('/', 'index')->name('notifications.index');
    Route::get('/{notification}', 'show')->name('notifications.show');
    Route::get('/create', 'create')->name('notifications.create');
    Route::get('/edit', 'create')->name('notifications.edit');
    Route::post('/', 'store')->name('notifications.store');
    Route::put('/{notification}', 'update')->name('notifications.update');
    Route::delete('/{notification}', 'destroy')->name('notifications.destroy');
});

Route::group(['prefix' => 'profile', 'controller' => ProfileController::class], function () {
    Route::get('/', 'index')->name('profile.index');
    Route::get('/{profile}', 'show')->name('profile.show');
    Route::get('/create', 'create')->name('profile.create');
    Route::get('/edit', 'create')->name('profile.edit');
    Route::post('/', 'store')->name('profile.store');
    Route::put('/{profile}', 'update')->name('profile.update');
    Route::delete('/{profile}', 'destroy')->name('profile.destroy');
});
