@extends('layouts.base')

@section('pageTitle')
    Aggiungi un nuovo film
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

        <form action="{{route('movies.store')}}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="cover_image">Iimage_covermmagine Cover</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" placeholder="URL Immaggine">
            </div>

            <div class="form-group">
                <label for="title">Titolo</label>
                {{-- per far vedere l'errore nell'input aggiungere la classe boostrap con blade --}}
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo">
            </div>
            <div class="form-group">
                <label for="author">Regista</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Regista">
            </div>
            <div class="form-group">
                <label for="genre">Generi</label>
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Generi">
            </div>
            <div class="form-group">
                <label for="plot">Trama</label>
                <textarea class="form-control" id="plot" name="plot" rows="8" placeholder="Trama..."></textarea>
            </div>

            <div class="form-group">
                <label for="year">Anno</label>
                <select class="form-control" id="year" name="year">
                    @for ($i = 1900; $i <= date("Y") + 1; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection