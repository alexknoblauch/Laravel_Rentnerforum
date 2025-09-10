<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cooking;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CookingController extends Controller
{
    
    public function index($slug = null){
        $cookings = Cooking::latest()->get();
        return view('cooking.index', compact('cookings'));
    }

    public function show($slug){
        $post = Cooking::with('likes')->where('title_slug', $slug)->firstOrFail();
        $comments = Comment::where('commentable_id', $post->id)->where('commentable_type', 'App\\Models\\Cooking')->latest()->get();
        $type = get_class($post);
        $post['type'] = $type;

        return view('cooking.show', compact('post', 'comments', 'type'));
    }

    public function store(Request $request){
        ##HTTP request
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'in:5,10,15,20,25,30,35,40,45,50,55,60,65,70,75'],
            'description' => ['required','string', 'max:1000'],
            'image' => ['nullable', 'image']
        ]);

        if(Cooking::where('title', $data['title'])->exists()){
            return redirect()->route('cooking.index')->with('error', 'Dieser Titel existiert bereits.');
        }

        if($request->hasFile('image')){
            $imgPath = $request->file('image')->store('uploads', 'public');
        } else {
            $imgPath = 'uploads/kochen.png';
        }

        $data['image'] = $imgPath;
        $data['title_slug'] = Str::slug($data['title']);
        Auth::user()->cookings()->create($data);
        $cookings = Cooking::all()->reverse(); 


        ##HTTP response
        return redirect()->route('cooking.index');
    }


}
