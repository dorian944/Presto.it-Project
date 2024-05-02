<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CreateAnnouncement extends Component
{
    #[Validate('required|min:3|max:50')] 
    public $title;

    #[Validate('required|min:10|max:50')] 
    public $body;

    #[Validate('required|numeric')] 
    public $price;

    #[Validate('required')]
    public $category;
   


    //per customizzare i messaggi di validazione
    protected $messages = [
        'required' => 'Campo richiesto',
        'min' => 'Il campo deve essere minimo di :min caratteri',
        'max' => 'Il campo deve essere massimo di :max caratteri',
        'numeric'=>'Il campo deve essere numerico con massimo due decimali'
        ];

    public function store(){
        $this->validate(); 
       
        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
                'title'=>$this->title,
                'body'=>$this->body,
                'price'=>$this->price,
            ]);
    
        Auth::user()->announcements()->save($announcement);
        
        session()->flash('AnnouncementCreated', 'Annuncio '. $this->title . ' creato con successo');
        //flash(è come with)
        
        // $this→cleanForm(); fa le stesse cose del reset, ovvero dopo aver registrato il record, azzeriamo nel form i vari input
        $this->reset();
        return redirect()->to(route('announcements.create'));
    }

    public function render()
    {
        //passaggio di categorie per creare un nuovo annuncio
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
