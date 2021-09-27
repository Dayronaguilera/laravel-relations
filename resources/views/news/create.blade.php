@extends('layouts.app')

@section('content')
<div class="container cont-create">
    <div class="row justify-content-center">
        <div class="col-8">
        <h1>Crea il tuo post</h1>
            <form class="container-form" action="{{ route('news.store') }}" method="POST">
            @csrf

                <label for="title"></label>
                <input class="m-3 input-w"  type="text" name="title" id="title" placeholder="Title">              
                
                <label for="content"></label>
                <textarea rows="5" class="m-3 input-w" type="text" name="content" id="content" placeholder="Text Area"></textarea>
                
                <label for="image"></label>
                <input class="m-3 input-w" type="text" name="image" id="image" placeholder="Picture url">
                
                <select class="custom-select m-3" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->author }}</option>
                    @endforeach
                </select>
                
                <div class="form-group">
                    <div class="row justify-content-center">
                        
                        @foreach($tags as $tag)
                            <div>
                                {{-- tag[] diventerà un array di id di autori per cui abbiamo flaggato la checbox --}}
                                <input name="tag[]" type="checkbox" value="{{ $tag->id }}">
                                <label  class="mr-2">{{$tag->name}} </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <input class="btn btn-success m-3" type="submit" value="Invia">
                
            </form>

        </div>

    </div>
</div>
@endsection