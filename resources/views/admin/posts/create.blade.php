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
    <form action="{{ route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- titolo del post -->
        <div class="input">
            <label for="title">Aggiungi un titolo: </label><br>
            <input type="text" name="title">
            @error('title')
                <p class="error">{{$message}}</p>
            @enderror
        </div>
        
        <!-- immagine del post -->
        <div class="input">
            <label for="post-image">Aggiungi un titolo: </label><br>
            <input type="file" name="post-image" />
        </div>
        


        <!-- contenuto del post -->
        <div class="input">
            <label for="content">Testo: </label><br>
            <textarea type="text" name="content"></textarea>
            @error('content')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <!-- categorie del post -->
        <div class="categories-check">
            <label>Categoria: </label><br>
            <select name="category_id">

                <option value="">Scegli categoria</option>

                @foreach ($categories as $category)

                    <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                    
                @endforeach

            </select>
            @error('category_id')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <!-- tags del post -->
        <div class="tags">  
            <label> Tags </label>

            @foreach ($tags as $tag)

                <div class="tag-box">

                    <input type="checkbox" value="{{ $tag->id }}" name="tags[]" 
                        {{ in_array($tag->id, old('tags', []))  ? 'checked' : ''}}>

                    <span>{{ $tag->name }}</span>

                </div>
                
                @error('tags[]')
                    <p class="error">{{$message}}</p>
                @enderror
                
            @endforeach
            
        </div>

        <input type="submit" value="Invia">
    
    </form>

    <div class="buttons">

        <a href="{{ route('admin.posts.index')}}">Annulla</a>
        
    </div>
@endsection