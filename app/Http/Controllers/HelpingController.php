<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Helpinghand;
use App\Models\Comment;
use App\Models\Gemeinde;
use Illuminate\Support\Str; 


class HelpingController extends Controller
{
    public function index(){
        $tasks = Helpinghand::latest()->get();
        $gemeinden = Gemeinde::all();
        return view('helping.index', compact('tasks', 'gemeinden'));
    } 

    public function update($id){
        $post = Helpinghand::findOrFail($id);

        $post->is_active = !$post->is_active;
        
        $post->save();
        return response()->json('acivity', $post->is_active);
    }

    public function show($slug){
        $post = Helpinghand::where('title_slug', $slug)->firstOrFail();
        $comments = Comment::where('commentable_id', $post->id)->latest()->get();
        return view('helping.show', compact('post', 'comments'));
    }

    public function store(Request $request){
            ##HTTP Request
            $data = $request->validate([
                'title' => ['max:60', 'string', 'required'],
                'canton' => ['required', 'string'],
                'gemeinde' => ['max:40','required', 'string'],
                'description' => ['max:2000', 'required', 'string']
            ]);

            $data['title_slug'] = Str::slug($data['title']);
            $gemeinde = $data['gemeinde'] = ucfirst($data['gemeinde']);
            $data['gemeinde_id'] = Gemeinde::firstOrCreate(['gemeinde' => $gemeinde])->id;
            unset($data['gemeinde']);
            $data['user_id'] = auth()->id();

            Helpinghand::create($data);

            ##HTTP Response
            return redirect(route('helping.index'));
    }
}
