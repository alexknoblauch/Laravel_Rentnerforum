<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Gemeinde;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;



class TravelController extends Controller
{
    public function index(){

        $travels = Cache::remember('travels', now()->addMinutes(1), function () {
            return Travel::latest()->get();
        }); 

        $gemeinden = Gemeinde::all();

        return view('travel.index', compact('travels', 'gemeinden'));
    }

    public function show(Request $request, $slug){
        $travel = Cache::remember("cooking.{$slug}", now()->addMinutes(60), function () use ($slug) {
            return Travel::with('likes')->where('title_slug', $slug)->firstOrFail();
        });
        $type = get_class($travel);
        $travel['type'] = $type; 
        $comments = Comment::where('commentable_id', $travel->id)->where('commentable_type', 'App\\Models\\Travel')->latest()->get();
        return view('travel.show', compact('slug', 'travel', 'comments'));
    }

    public function store(Request $request){

        Cache::forget('travels');

        ##HTTP-Request
        $validated = $request->validate([
            'title' => ['max:60', 'string', 'required'],
            'canton' => ['string', 'required'],
            'gemeinde' => ['max:40', 'string', 'required'],
            'description' => ['max:3000', 'required'],
            'image' => ['image', 'nullable']
        ]);

        if($request->hasFile('image')){
            $imgPath = $request->file('image')->storePublicly('uploads', 's3');
        } else {
            $imgPath = 'uploads/default_img_travel.png';
        }

        
        $validated['image'] = $imgPath;
        $validated['gemeinde'] = ucfirst($validated['gemeinde']);
        $validated['gemeinde_id'] = Gemeinde::firstOrCreate(['gemeinde' => $validated['gemeinde']])->id;
        unset($validated['gemeinde']);
        $validated['title_slug'] = Str::slug($request->title);
        $validated['user_id'] = auth()->id();

        Travel::create($validated);

        ##HTTP-Response einleiten
        return redirect(route('travel.index'));
    }
}
