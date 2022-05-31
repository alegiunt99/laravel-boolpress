@extends('layouts.dashboard')

@section('content')

    <div class="title-create">

        <h1>
            Tutti i post
        </h1>

        <a href="{{route('admin.posts.create')}}">Crea nuovo post</a>

    </div>
    
    @foreach ($posts as $post)

    <div class="post-section">

        <div>
            <p><strong>Codice post: </strong>{{$post->id}}</p>
        </div>

        <div>
            <p><strong>Titolo: </strong>{{$post->title}}</p>
        </div>

        <div>
            <p> <strong>Contenuto: </strong>{{$post->content}}</p>
        </div>

        <div>
            <p>  <strong>slug: </strong>{{$post->slug}}</p>
        </div>

        <div>
            <p><strong>Data di creazione: </strong>{{$post->created_at}}</p>
        </div>
    </div>
        
        
    @endforeach
@endsection