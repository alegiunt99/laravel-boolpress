@extends('layouts.dashboard')


<!-- Visualizzazione singolo componente -->
@section('content')

    <div class="content">

        <div class="image-post">

            <img src="{{ asset('storage/' . $post->cover) }}">

        </div>

        <h1>{{$post->title}}</h1>


        <p>{{$post->content}}</p>
        
        <p>{{ $categories->name}}</p>

        @foreach ($post->tags as $tag)
            <span><strong> <em>#{{ $tag->name}}</em> </strong></span>
        @endforeach
        
    </div>


    <div class="buttons">

        <!-- pulsante di ritorno alla pagina precedente -->
        <a href="{{ route('admin.posts.index')}}">Back</a>

        <!-- pulsante di modifica -->
        <a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>

        <!--pulsante di cancellazione -->
        <form action="{{ route('admin.posts.destroy', $post->id) }} " method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Elimina</button>
        </form>
    </div>
    
@endsection
