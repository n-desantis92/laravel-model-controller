
@extends('layout.base')

@section('pageTitle')
    {{$movie->title}}
@endsection

@section('content')
    @foreach ($movie-> as $movie)
    <h2>{{$movie->year}}</h2>
    <p>{{$movie->plot}}</p>
    <a href="{{route('movies.index')}}">torna all'homepage</a>
    @endforeach
@endsection