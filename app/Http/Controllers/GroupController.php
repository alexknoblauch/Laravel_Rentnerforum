<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupPost;
use Illuminate\Support\Str;




class GroupController extends Controller
{
    public function index() {
        $groups = Group::latest()->get();
        return view('group.index', compact('groups'));
    }

    public function show($slug) {
        $thema = Group::where('title_slug', $slug)->first();
        $posts = GroupPost::where('group_id', $thema->id)->latest()->get();

        $gruppe = Group::latest()->first();
        
 
        return view('group.show', compact('thema', 'posts', 'gruppe'));
    }


    public function store(Request $request) {
        $data = $request->validate([
            'title' => ['string', 'max:40', 'required'],
        ]);
        $data['title_slug'] = Str::slug($data['title']);

        $exists = Group::where('title', $data['title'])->exists();


        if($exists){
            return response()->json(['status' => 'error']);
            exit;
        }
        
        Group::create($data);

        return response()->json([
            'title' => $data['title'],
            'title_slug' => $data['title_slug'],
        ]);
    }
}
