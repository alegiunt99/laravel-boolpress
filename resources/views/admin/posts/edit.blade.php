@extends('layouts.dashboard')

<!-- Form di modifica --> 
@section('content')

    <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="input">

            <label for="title">Title: </label><br>
            <input type="text" name="title" value="{{ $post->title }}">

        </div>
        
        <div class="input">

            <label for="content">Content: </label><br>
            <input type="text" name="content" value="{{ $post->content }}">

        </div>
        

        <input type="submit" value="Invia">
    </form>

    <div class="buttons">

        <!--pulsante per annullare la modificas -->
        <a href="{{ route('admin.posts.show', $post->id)}}">Annulla</a>
        
    </div>
    
@endsection 