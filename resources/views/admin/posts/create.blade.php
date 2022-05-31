@extends('layouts.dashboard')

@section('content')

    <div class="title-create">

        <h1>
            Crea nuovo post
        </h1>
        
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="error">Attenzione! {{$error}}</p>
        @endforeach
    @endif
    <form action="{{ route('admin.posts.store')}}" method="POST">
        @csrf

        <!-- titolo del post -->
        <div class="input">
            <label for="title">Aggiungi un titolo: </label><br>
            <input type="text" name="title">
            @error('title')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        
        <!-- contenuto del post -->
        <div class="input">
            <label for="content">Testo: </label><br>
            <input type="text" name="content">
            @error('content')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <input type="submit" value="Invia">
    
    </form>

    <div class="buttons">

        <a href="{{ route('admin.posts.index')}}">Annulla</a>
        
    </div>
@endsection