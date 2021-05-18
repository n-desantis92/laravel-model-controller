@extends('layout.base')

@section('pageTitle')
    Lista dei film
@endsection
@section('content')
    <ul>
        @foreach ($movies-> as $movie)
            <li>
                <h3>{{$movie->title}}</h3>
                <h4>{{$movie->author}}</h4>
                <p>{{$movie->genre}}</p>
                <a href="{{route('movies.show', ['movie' => $movie->id])}}">dettaglio film</a>
            </li>
        @endforeach

    </ul>
@endsection