@extends('layouts.dashboard')

@section('content')


    <h1>
        ciao
    </h1>
    @foreach ($posts as $post)

        <div>
            <h2>Titolo: <br>
                {{$post->title}}
            </h2>
        </div>

        <div>
            <p>Contenuto: <br>
                {{$post->content}}
            </p>
        </div>

        <div>
            <p>Titolo: <br>
                {{$post->slug}}
            </p>
        </div>
        
    @endforeach
@endsection