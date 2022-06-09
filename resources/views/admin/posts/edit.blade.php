@extends('layouts.dashboard')

<!-- Form di modifica --> 
@section('content')

    <form action="{{ route('admin.posts.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- titolo del post -->
        <div class="input">

            <label for="title">Title: </label><br>
            <input type="text" name="title" value="{{ $post->title }}">

            @error('title')
                <p class="error">{{$message}}</p>
            @enderror

        </div>

        <!-- immagine del post -->
        <div class="input">

            <div class="image-post">

                <img src="{{ asset('storage/' . $post->cover) }}">
    
            </div>

            <label for="post-image">Aggiungi un titolo: </label><br>
            <input type="file" name="post-image" />
        </div>
        
        <!-- contenuto del post -->
        <div class="input">

            <label for="content">Content: </label><br>
            <input type="text" name="content" value="{{ $post->content }}">

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

                    <option value="{{$category->id}}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                    
                @endforeach


                @error('category_id')
                    <p class="error">{{$message}}</p>
                @enderror
            </select>
        </div>

            <!-- tags del post -->
            <div class="tags">  
                <label> Tags </label>

                @foreach ($tags as $tag)
                    <div class="tag-box">

                        @if ($errors->any())

                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]" 
                            {{ in_array($tag->id, old('tags', []))  ? 'checked' : ''}}>


                        @else
                            
                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]" 
                            {{ $post->tags->contains($tag) ? 'checked' : ''}}>

                        @endif
                    
                        <span>{{ $tag->name }}</span>

                    </div>
                    
                    
                @endforeach
            </div>
        <input type="submit" value="Invia">
    </form>

    <div class="buttons">

        <!--pulsante per annullare la modificas -->
        <a href="{{ route('admin.posts.show', $post->id)}}">Annulla</a>
        
    </div>
    
@endsection 