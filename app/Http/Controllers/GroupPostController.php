<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupPost;
use App\Models\Group;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class GroupPostController extends Controller
{
    function show($groupSlug, $groupPostSlug){
        $group = Group::where('title_slug', $groupSlug)->firstOrFail();

        $post = GroupPost::where('title_slug', $groupPostSlug)
                        ->where('group_id', $group->id)
                        ->firstOrFail();

        $comments = Comment::where('commentable_id', $post->id)->where('commentable_type', 'App\\Models\\GroupPost')->latest()->get();

        return view('groupPost.show', compact('post', 'comments', 'group'));
    }

    function store(Request $request, $groupSlug){

        //Request
        $data = request()->validate([
            'title' => ['max:100', 'required', 'string'],
            'description' => ['max:4000', 'required', 'string'],
        ]);

        
        $data['title_slug'] = Str::slug($data['title']);
        $data['group_id'] = Group::where('title_slug', $groupSlug)->firstOrFail()->id;
        $data['user_id'] = Auth::id();


        GroupPost::create($data);

        //Response
        return redirect()->route('group.show', $groupSlug);
    }
}
