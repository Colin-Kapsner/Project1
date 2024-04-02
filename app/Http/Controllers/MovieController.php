<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Movie::class, 'movie');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::where('user_id', Auth::id())->orderBy('rating', 'desc')->get();
        return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'rating' => 'required|numeric|gt:0|lt:10.1',
            'genre' => 'required|in:action,horror,drama,sci-fi,comedy,romance,fantasy,other',
        ]);
        $movie = new Movie($request->all());
        $movie->user_id = Auth::id();
        $movie->save();
        
        return redirect(route('movies.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movie.edit', ['movie' => $movie, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->only(['title', 'rating']));
        $movie->genres()->detach();
        foreach($request->genres as $genre){
            $movie->genres()->attach($genre);
        }

        if($request->hasFile('movie_image')){
            $path = $request->file('movie_image')->store('public/images');
            $movie->profile_image = $path;
        }

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response('success', 200);
    }
}
