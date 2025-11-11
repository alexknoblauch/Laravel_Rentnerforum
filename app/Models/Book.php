<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
   
   use HasFactory;
   protected $guarded = [];

   public function user(){
      return $this->belongsTo(User::class);
   } 

   public function author(){
      return $this->belongsTo(Author::class);
   }

   public function comments(){
      return $this->morphMany(Comment::class, 'commentable');
   }

    public function likes(){
      return $this->morphMany(Like::class, 'likeable');
   }
}
