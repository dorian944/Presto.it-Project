<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

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


// sezione revisore
// home revisore
Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.index');

//accetta annuncio
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

//rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');

