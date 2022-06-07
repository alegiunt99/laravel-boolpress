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

        <!-- categorie del post -->
        <div class="categories-check">
            <label>Categoria: </label><br>
            <select name="category_id">

                <option value="">Scegli categoria</option>

                @foreach ($categories as $category)

                    <option value="{{$category->id}}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                    
                @endforeach

            </select>
        </div>

        <input type="submit" value="Invia">
    </form>

    <div class="buttons">

        <!--pulsante per annullare la modificas -->
        <a href="{{ route('admin.posts.show', $post->id)}}">Annulla</a>
        
    </div>
    
@endsection 