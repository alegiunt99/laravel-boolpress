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

        <!-- contenuto del post -->
        <div class="categories-check">
            <label>Categoria: </label><br>
            <select name="category_id">

                <option value="">Scegli categoria</option>

                @foreach ($categories as $category)

                    <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                    
                @endforeach

            </select>
            
        </div>

        <input type="submit" value="Invia">
    
    </form>

    <div class="buttons">

        <a href="{{ route('admin.posts.index')}}">Annulla</a>
        
    </div>
@endsection