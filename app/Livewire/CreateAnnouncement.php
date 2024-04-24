<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\Attributes\Validate;

class CreateAnnouncement extends Component
{
    #[Validate('required|min:3|max:50')] 
    public $title;

    #[Validate('required|min:3|max:50')] 
    public $body;

    #[Validate('required|numeric')] 
    public $price;

    //per customizzare i messaggi di validazione
    protected $messages = [
        'required' => 'Campo richiesto',
        'min' => 'Il campo deve essere di :min caratteri',
        'max' => 'Il campo deve essere di :max caratteri',
        'numeric'=>'Il campo deve essere un numero con massimo due decimali'
        ];

    public function store(){
        Announcement::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);

        session()->flash('AnnouncementCreated', 'Annuncio '. $this->title . ' creato con successo');
        //flash(è come with)
        
        // $this→cleanForm(); fa le stesse cose del reset, ovvero dopo aver registrato il record, azzeriamo nel form i vari input
        $this->reset();
        return redirect()->to(route('announcements.create'));
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
