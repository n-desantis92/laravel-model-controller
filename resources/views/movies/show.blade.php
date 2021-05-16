<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>show</title>
</head>
<body>
    <header>
        <a href="{{route('movies.index')}}">torna all'homepage</a>
    </header>
    <div class="dettaglio">
        <h1>{{$movie->title}}</h1>
        <h2>{{$movie->year}}</h2>
        <p>{{$movie->plot}}</p>
    </div>

</body>
</html>