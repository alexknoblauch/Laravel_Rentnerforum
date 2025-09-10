<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class BookController extends Controller
{

    public function index(){
        $books = Cache::remember('books', now()->addMinutes(1), function () {
            return Book::latest()->get();
        });      

        $authors = Author::pluck('author');

        return view('book.index', compact('books', 'authors'));
    }

    public function show($slug){
        $book = Book::with('likes')->where('title_slug', $slug)->firstOrFail();
        $type = get_class($book);
        $book['type'] = $type;

        $comments = Comment::where('commentable_id', $book->id)->where('commentable_type', 'App\\Models\\Book')->latest()->get();
        
        return view('book.show', compact('book', 'comments', 'type'));
    }

    public function store(Request $request){

        Cache::forget('books');

        ##HTTP Request
        $data = $request->validate([
            'title' => ['max:70', 'string', 'required'],
            'cathegory' => ['max:30', 'string', 'required'],
            'seiten' => ['integer', 'required'],
            'description' => ['max:2000', 'string', 'required'],
            'author' => ['string', 'max:100', 'required']
        ]);
        $data['title_slug'] = Str::slug($data['title']);
        $authorName = ucwords(strtolower(trim($data['author'])));

        $author = Author::firstOrCreate(['author' => $authorName]);
        $data['author_id'] = $author->id;
        $data['image'] = 'uploads/default_img_buch.png';

        unset($data['author']);

        Book::create([
            'title' => $data['title'],
            'cathegory' => $data['cathegory'],
            'seiten' => $data['seiten'], 
            'description' => $data['description'],
            'title_slug' => Str::slug($data['title']),
            'author_id' => $author->id,
            'img' =>  'uploads/default_img_buch.jpg'
        ]);

        ##HTTP Response
        return redirect()->route('book.index');
    }
}
