<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:50')] 
    public $title;

    #[Validate('required|min:10|max:50')] 
    public $body;

    #[Validate('required|numeric')] 
    public $price;

    #[Validate('required')]
    public $category;
   
    public $images = [];
    public $image;
    public $temporary_images;

    

    protected $rules = [
        'images.*'=>'image|max:1024',
        'temporary_images.*'=> 'image|max:1024',
    ];

    //per customizzare i messaggi di validazione
    protected $messages = [
        'required' => 'Campo richiesto',
        'min' => 'Il campo deve essere minimo di :min caratteri',
        'max' => 'Il campo deve essere massimo di :max caratteri',
        'numeric'=>'Il campo deve essere numerico con massimo due decimali',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 5mb',
        'images.image' => 'L\'immagine dev\'essere massimo un\'immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 5mb',
        ];

    public function store(){
        $this->validate(); 
       
        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
                'title'=>$this->title,
                'body'=>$this->body,
                'price'=>$this->price,
            ]);
    
        

        $announcement->user()->associate(Auth::user());
        
        if(count($this->images)){
            foreach($this->images as $image) {
                $announcement->images()->create(['path'=>$image->store('images','public')]);
            }
        }

        session()->flash('AnnouncementCreated', 'Annuncio '. $this->title . ' creato con successo. Sarà pubblicato dopo la revisione');
        //flash(è come with)
        
        // $this→cleanForm(); fa le stesse cose del reset, ovvero dopo aver registrato il record, azzeriamo nel form i vari input
        $this->reset();
        return redirect()->to(route('announcements.create'));
    }

    public function updatedTemporaryImages()
    {
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ]))
        foreach ($this->temporary_images as $image){
            $this->images[]=$image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

   

    public function render()
    {
        //passaggio di categorie per creare un nuovo annuncio
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
