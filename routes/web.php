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
Route::get('/area/personale', [PublicController::class, 'personalArea'])->name('area.personale');

Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('categoryShow');


Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');
Route::get('/annuncio/dettaglio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

//Cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');




// sezione revisore
// home revisore - middleware revisore
Route::get('/revisore/home',[RevisorController::class, 'index'])->name('revisor.index');

//accetta annuncio - middleware revisore
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');

//rifiuta annuncio - middleware revisore
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');

// annulla ultima revisione - middleware revisore
Route::patch('/annulla/revisione', [RevisorController::class, 'backStep'] )->name('back.step');

//diventare revisori - middleware auth - form mail
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

//rendi utente revisore - senza middleware perchè cliccabile nella mail per diventare revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//rotta submit per inviare la mail - middleware auth
Route::post('/richiesta/revisore/mail', [RevisorController::class, 'revisorSubmit'])->name('revisor.submit');

//fine rotte revisore


//rotta per visualizzare l'index annunci
Route::get('/lista/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');




//rotta per tntsearch 

Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');
