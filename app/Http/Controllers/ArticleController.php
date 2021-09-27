<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article; // indichiamo il model
use App\Author; // indichiamo il model
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsPages = Article::all(); // prendiamo tutti i dati dal db
        
        return view('home', compact('newsPages')); // mandiamo tutti i dati presi dal db
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all(); // mandiamo author nella select
        $tags = Tag::all();
        return view('news.create', compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $data = $request->all();
        

        $article = new Article();
        $article->title =$data['title'];
        $article->content =$data['content'];
        $article->image =$data['image'];
        $article->author_id =$data['author_id'];
        $article->save();

        foreach($data['tag'] as $tagID) {
            $article->tag()->attach($tagID);
        }
        
        return redirect()->route('news.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $article = Article::find($id);
        
        return view('news.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // modifica
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
