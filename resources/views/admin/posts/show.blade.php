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

    </div>
    
@endsection
