<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/',[PublicController::class, 'homepage'])->name('homepage');
Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('categoryShow');


Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');
Route::get('/annuncio/show/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');