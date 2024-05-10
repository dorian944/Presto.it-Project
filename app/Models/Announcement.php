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

    //zona revisore
    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function returnTitle()
    {
        return $this->title;
    }
}
