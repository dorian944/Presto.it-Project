<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\RevisorMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    // public function __construct(){
        //tutte le funzioni possono essere usate da utenti revisori tranne becomeRevisor che può essere usato da utenti autenticati
        // $this->middleware('isRevisor')->except('becomeRevisor');
      
        
        
    // }


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

        $name = $request->name;
        $email = $request->email;
        $user_message = $request->user_message;
       
        try{
            Mail::to($email)->send(new RevisorMail($name, $email, $user_message)); 
        } catch(Exception $error){
            return redirect()->back()->with('emailError', 'Richiesta fallita. Ci scusiamo per il disagio. Riprova più tardi');
        }
        return redirect(route('homepage'))->with('emailSent', 'Abbiamo ricevuto la tua mail. Ti contatteremo il prima possibile.');

        // try{
        //     Mail::to($email)->send(new RevisorMail($name, $email, $user_message)); 
        // } catch(Exception $error){
        //     return redirect(route('become.revisor'))->with('emailError', 'Richiesta fallita. Ci scusiamo per il disagio. Riprova più tardi');
        // }
        // return redirect(route('become.revisor'))->with('emailSent', 'Abbiamo ricevuto la tua mail. Ti contatteremo il prima possibile.');
        
    }
    

}
