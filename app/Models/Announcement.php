<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','price','category_id'];

    //un annuncio ha una sola categoria
    public function category(){
        return $this->belongsTo(category::class);
    }

    //un annuncio appartiene ad un solo utente
    public function user(){
        return $this->belongsTo(User::class);
    }
}
