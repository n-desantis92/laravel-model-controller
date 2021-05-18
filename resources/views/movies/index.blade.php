@extends('layouts.base')

@section('pageTitle')
    Lista dei film
@endsection
@section('content')
    <div class="mt-5">
        <div class="text-right">
            <a href="{{route('movies.create')}}"><button type="button" class="btn btn-success mb-3 ">Aggiungi Film</button></a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Regista</th>
                    <th scope="col">Generi</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->author}}</td>
                    <td>{{$movie->genre}}</td>
                    <td><a href="{{route('movies.show', ['movie' => $movie->id])}}"><button type="button" class="btn btn-primary">visualizza</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection