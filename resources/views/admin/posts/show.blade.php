@extends('layouts.dashboard')


<!-- Visualizzazione singolo componente -->
@section('content')

    <div class="content">

        <h1>{{$post->title}}</h1>

        <p>{{$post->content}}</p>
        
    </div>

    <div class="buttons">

        <!-- pulsante di ritorno alla pagina precedente -->
        <a href="{{ route('admin.posts.index')}}">Back</a>

        <!-- pulsante di modifica -->
        <a href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>

    </div>
    
@endsection
