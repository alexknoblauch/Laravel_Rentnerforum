<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cooking extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'duration', 'description', 'title_slug', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morpthMany(Comment::class, 'commentable');
    }

    public function likes(){
      return $this->morphMany(Like::class, 'likeable');
      
    }
}
