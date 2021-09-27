@extends('layouts.app')

@section('content')

<div class="container cont-show">
    <div class="row">
        <div class="container-card offset-2 col-8">
            <h1 class="title">{{$article->title}}</h1>

            @foreach($article->tag as $tag)
                <span>{{$tag->name}}</span>
            @endforeach
            <div class="container-img">
                <img src="{{$article->image}}" alt="picture-{{$article->title}}">
            </div>
            <div>
                <p>{{$article->content}}</p>
                <div class="row cont-footer ">

                    <span>
                        <span class="cont-date">Created Date :</span><span class="font-z">{{$article->created_at}}</span> 
                    </span>
                    <span>
                        <span class="cont-date">Write By :</span> <span class="font-z">{{$article->author->author}}</span>  <img src="{{$article->author->photo}}" alt="">
                    </span>
                </div>
                

            </div>
        </div>

    </div>
@endsection
