@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @foreach($newsPage as $article)
        <div class="col-6">
            <div class="img-container">
                <img src="{{$article->image}}" alt="picture of {{$article->title}}"> 
            </div>
            <h1>{{$article->title}}</h1>
            <p>{{$article->content}}</p>
        </div>

    @endforeach
    </div> 
</div>
@endsection
