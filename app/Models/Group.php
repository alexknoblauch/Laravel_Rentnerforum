<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{

    use HasFactory;

    protected $table = 'grouping';
    protected $guarded = [];

    public function groupPosts(){
        return $this->hasMany(GroupPost::class);
    }
}
