<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    protected $requestValidation = [];
    public function __construct()
    {
        $year = date('Y') + 1;

        $this->requestValidation = [
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'plot' => 'required|string',
            'year' => 'required|numeric|min:1900|max:' . $year
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        $movies_fantasy = Movie::where('genre', 'like', '%fantascienza%')
        ->orderBy('year', 'asc')
        ->get();
        
        return view('movies.index', compact('movies', 'movies_fantasy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        if ($data['cover_image'] == NULL) {
            unset($data['cover_image']);
        }

        // per validare i dati in entrata dell'utente vai a riga 10/20
        $request->validate($this->requestValidation);


        $movieNew = Movie::create($data);

        // $data = $request->all();

        // $movieNew = new Movie();
        // $movieNew ->title = $data['title'];
        // $movieNew->author = $data['author'];
        // $movieNew-> genre= $data['genre'];
        // $movieNew->plot = $data['plot'];
        // $movieNew->year = $data['year'];
        // if( isset($data['cover_image']) && !empty($data['cover_image']) ) {

        //     $movieNew->cover_image = $data['cover_image'];
        // }
        // //per inviare e salvare i dati in entrata
        // $movieNew->save();

        // reindirizzo alla pagina che voglio tramite
        return redirect()->route('movies.index')->with('message', 'Il film '.$movieNew->title . ' è stato aggiunto!');


    }

    /**
     * Display the specified resource.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        $data = $request->all();

        if ($data['cover_image'] == NULL) {
            unset($data['cover_image']);
        }

        // validazione dei dati in entrata
        $request->validate($this->requestValidation);

        // queri di aggiornamento
        $movie->update($data);
        // reindirizzamento alla pagina
        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        return redirect()->route('movies.index')->with('message', 'Il film è stato eliminato!');
    }
}
