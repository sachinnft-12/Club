<?php

use App\Http\Controllers\Admin\BannerAdminController;
use App\Http\Controllers\Admin\ClubAdminController;
use App\Http\Controllers\Admin\CoachAdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HallOfFameAdminController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\ResourceAdminController;
use App\Http\Controllers\Admin\TournamentAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');
Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/clubs/{club:public_slug}', [ClubController::class, 'show'])->name('clubs.show');

Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::get('/coaches/{coach:public_slug}', [CoachController::class, 'show'])->name('coaches.show');

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('/tournaments/{tournament}', [TournamentController::class, 'show'])->name('tournaments.show');

Route::get('/resources', [PageController::class, 'resources'])->name('resources');
Route::get('/hall-of-fame', [PageController::class, 'hallOfFame'])->name('hall-of-fame');
Route::get('/news-events', [PageController::class, 'news'])->name('news');

Route::view('/register/player', 'auth.register-player')->name('register.player');
Route::view('/register/coach', 'auth.register-coach')->name('register.coach');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/policy', [PageController::class, 'policy'])->name('policy');

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('dashboard');

    Route::resource('users', UserAdminController::class)->except(['show', 'create', 'store']);
    Route::resource('clubs', ClubAdminController::class)->except(['show', 'create', 'store']);
    Route::resource('coaches', CoachAdminController::class)->except(['show', 'create', 'store']);
    Route::resource('tournaments', TournamentAdminController::class)->except(['show', 'create', 'store']);
    Route::resource('resources', ResourceAdminController::class)->except(['show']);
    Route::resource('news', NewsAdminController::class)->except(['show']);
    Route::resource('banners', BannerAdminController::class)->except(['show']);
    Route::resource('hall-of-fame', HallOfFameAdminController::class)->except(['show']);
});
