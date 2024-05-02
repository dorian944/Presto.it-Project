<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\RevisorMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function __construct(){
        // tutte le funzioni possono essere usate da utenti revisori tranne becomeRevisor che può essere usato da utenti autenticati
        $this->middleware('isRevisor')->except('becomeRevisor','revisorSubmit','makeRevisor');
      $this->middleware('auth')->only('becomeRevisor','revisorSubmit');


    }


    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti hai rifiutato l\'annuncio');
    }


    public function becomeRevisor()
    {
        return view('revisor.formMail');
    }

    public function revisorSubmit(Request $request){
        // la email non deve essere modificata dall'utente altrimenti non corrisponde nel database e da errore

        $name = $request->name;
        $user_message = $request->user_message;


        try{
            Mail::to(Auth::user()->email)->send(new RevisorMail(Auth::user(),$name, $user_message));
        } catch(Exception $error){
            return redirect(route('become.revisor'))->with('emailError', 'Richiesta fallita. Ci scusiamo per il disagio. Riprova più tardi');
        }
        return redirect(route('become.revisor'))->with('emailSent', 'Abbiamo ricevuto la tua mail. Ti contatteremo il prima possibile.');

    }//fine revisorSubmit

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor' , ["email"=>$user->email]);
        return redirect('/')->with('message', 'L\'utente è diventato revisore');
    }

      //traccia extra
      //l'utente clicca su un bottone per tornare indietro e si attiva una funzione che annulla l'ultima revisione confermata o rifiuta. quindi dobbiamo portare indietro a null is_accepted
    // public function backStep(){

    // }
    public function backStep()
    {
        // Recupera l'ultima revisione confermata o rifiutata
        $lastRevision = Announcement::whereNotNull('is_accepted')->latest()->first();

        // Verifica se è stata trovata una revisione
        if ($lastRevision) {
            // Annulla la revisione
            $lastRevision->update(['is_accepted' => null]);

            return redirect('/')->with('message', 'Ultima revisione annullata con successo');
        } else {
            return redirect('/')->with('message', 'Nessuna revisione da annullare');
        }
    }




}
