@extends('layouts.base')

@section('pageTitle')
    Modifica film: {{$movie->title}}
@endsection

@section('content')

    <div class="mt-5">
    {{-- visualizzatore di errori --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>   
        @endif
    {{-- /visualizzatore di errori --}}

        <form action="{{route('movies.update', ['movie' => $movie->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cover_image">Image_cover</label>
                <img src="{{$movie->cover_image}}" alt="" style="width: 100px">
                <input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="URL Immaggine" value="{{old('cover_image') ? old('cover_image') : $movie->cover_image}}">
            </div>

            <div class="form-group">
                <label for="title">Titolo</label>
                {{-- per far vedere l'errore nell'input aggiungere la classe boostrap con blade --}}
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo" value="{{old('title') ? old('title') : $movie->title}}">
            </div>
            <div class="form-group">
                <label for="author">Regista</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Regista" value="{{old('author') ? old('author') : $movie->author}}">
            </div>
            <div class="form-group">
                <label for="genre">Generi</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Generi" value="{{old('genre') ? old('genre') : $movie->genre}}">
            </div>
            <div class="form-group">
                <label for="plot">Trama</label>
                <textarea class="form-control" id="plot" name="plot" rows="8" placeholder="Trama...">{{old('plot') ? old('plot') : $movie->plot}}</textarea>
            </div>

            <div class="form-group">
                <label for="year">Anno</label>
                <select class="form-control" id="year" name="year">
                    @for ($i = 1900; $i <= date("Y") + 1; $i++)
                        < value="{{$i}}" {{old('year') == $i || $i == $movie->year ? 'selected' : ''}} >{{$i}}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection