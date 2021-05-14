<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

                </div>
                @endif
                
                <div class="content">
                    @foreach ($movies as $movie)
                    <li>
                        <h3>{{$movie->title}}</h3>
                        <h5>{{$movie->author}}</h5>
                        <p>Trama: <br>{{$movie->plot}}</p>
                    </li>
                    <a href="{{route('movies.show', ['movie' => $movie->id])}}">Dettaglio film</a>
                    @endforeach
                </div>
            </div>
    </body>
</html>
