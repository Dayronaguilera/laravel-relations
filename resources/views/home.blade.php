@extends('layouts.app')

@section('content')
<div class="container cont-home">
    <h1 class="title">la Repubblica</h1>
    <div class="row">
        <div class="col-8 border-cont">
            @foreach($newsPages as $article)
                <div class=" container-left">
                    <div class="img-container">
                        <a href="{{ route('news.show', $article)}}">
                            <img src="{{$article->image}}" alt="picture of {{$article->title}}"> 
                        </a>
                    </div>
                    <div class="cont-text">
                        <h1>{{$article->title}}</h1>
                        <span>Created: {{$article->created_at}}</span>
                    </div>
                    
                </div>
            @endforeach
        </div>
        <div class="col-4">
            @foreach($newsPages as $article)
                <div class=" container-right">
                    <h1>{{$article->title}}</h1>

                    <div class="img-container">
                        
                            <img src="{{$article->image}}" alt="picture of {{$article->title}}"> 
    
                    </div>   

                    <div class="cont-text">
                        <span>Created: {{$article->created_at}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> 
@endsection
