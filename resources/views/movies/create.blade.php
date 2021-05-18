@extends('layouts.base')

@section('pageTitle')
    Aggiungi un nuovo film
@endsection

@section('content')
    <div class="mt-5">
        <form action="{{'movies.store'}}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo">
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