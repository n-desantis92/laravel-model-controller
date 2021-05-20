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
                    <th scope="col">cover</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Regista</th>
                    <th scope="col">Generi</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <td><img src="{{$movie->cover_image}}" class="cover" alt="{{$movie->title}}" style="width: 100px"></td>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->author}}</td>
                    <td>{{$movie->genre}}</td>
                    <td>
                        <a href="{{route('movies.show', ['movie' => $movie->id])}}"><button type="button" class="btn btn-primary">visualizza</button></a>
                        <a href="{{route('movies.edit', ['movie' => $movie->id])}}"><button type="button" class="btn btn-success">Modifica</button></a>
                        <form action="{{route('movies.destroy', ['movie' => $movie->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection