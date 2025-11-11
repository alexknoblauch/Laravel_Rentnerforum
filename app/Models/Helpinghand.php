<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Helpinghand extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function tags(){
       return  $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function gemeinde(){
        return $this->belongsTo(Gemeinde::class, 'gemeinde_id');
    }

    public function likes(){
      return $this->morphMany(Like::class, 'likeable');
    }
    
}
