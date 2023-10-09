<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
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

Auth::routes();
// Register only when we do not have accounts
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('once');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Leaders
    Route::get('/leaders', [LeaderController::class, 'index'])->name('leaders');
    Route::get('/leaders/create', [LeaderController::class, 'create'])->name('leaders.create');
    Route::post('/leaders/store', [LeaderController::class, 'store'])->name('leaders.store');
    Route::get('/leaders/edit/{id}', [LeaderController::class, 'edit'])->name('leaders.edit');
    Route::post('/leaders/update', [LeaderController::class, 'update'])->name('leaders.update');

    // Clubs
    Route::get('/clubs', [ClubController::class, 'index'])->name('clubs');
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/clubs/store', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/clubs/edit/{id}', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::post('/clubs/update', [ClubController::class, 'update'])->name('clubs.update');
    Route::post('/clubs/show/{id}', [ClubController::class, 'show'])->name('clubs.show');
    Route::post('/clubs/destory', [ClubController::class, 'destroy'])->name('clubs.destroy');

    // Teams
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/update', [TeamController::class, 'update'])->name('teams.update');

    // Members
    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members/store', [MemberController::class, 'store'])->name('members.store');
    Route::get('/members/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
    Route::post('/members/update', [MemberController::class, 'update'])->name('members.update');
});
