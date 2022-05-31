<!-- @extends('layouts.dashboard')

 Form di modifica 
@section('content')

    <form action="{{ route('admin.posts.update')}}" method="POST">
        @csrf
        @method('PUT')

        <label for="title"></label>
        <input type="text" name="title" value="{{ old('title')}}">

        <label for="content"></label>
        <input type="text" name="content" value="{{ old('content')}}">

        ...content... 

        <input type="submit" value="Invia">
    </form>

    <div class="buttons">

         pulsante per annullare la modificas 
        <a href="{{ route('admin.posts.show')}}">Annulla</a>
        
    </div>
    
@endsection -->