<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\{UpdateMovieRequest, StoreMovieRequest};

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = new Movie;
        $movies = request()->has('q') ? $movies->where('title', 'like', '%'.request()->get('q').'%') : $movies;
        $movies = request()->has('category') ? $movies->whereIn('category_id',request()->get('category')) : $movies;
        $movies = request()->has('language') ? $movies->whereIn('language', request()->get('language')) : $movies;
        $movies = request()->has('year') ? $movies->where('year', request()->get('year')) : $movies;
        $movies = $movies->orderByDesc('id')->paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create',[
            'categories' => \App\Models\Category::whereParentId(1)->get(),
            'actors' => \App\Models\Actor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $inputs = $request->except('actors');
        $inputs['poster'] = $request->poster->store('movies/poster', 'public');
        $movie = Movie::create($inputs);
        if ($movie) {
            foreach ($request->actors as $movieActor) {
                DB::table('movie_actor')->insert([
                    'movie_id' => $movie->id,
                    'actor_id' => $movieActor
                ]);
            }
        }
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit',[
            'categories' => \App\Models\Category::whereParentId(1)->get(),
            'actors' => \App\Models\Actor::all(),
            'movie' => $movie,
            'movieActors' => DB::table('movie_actor')->where('movie_id', $movie->id)->pluck('actor_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $inputs = $request->except('actors');

        /**
         * Handling movie image poster updating operation
         */
        if ($request->has('poster')) {
            if ($movie->poster)
                unlink(storage_path('app\\public\\' . $movie->poster ));
            $inputs['poster'] = $request->poster->store('movies/poster', 'public');
        } else {
            $inputs = $request->except('poster', 'actors');
        }

        /**
         * Update movie record
         */
        $movie->update($inputs);

        /**
         * Handling movie actors
         * first delete all actors from table movie_actor and thene insert theme again
         */
        DB::table('movie_actor')->where('movie_id', $movie->id)->delete();

        foreach ($request->actors as $movieActor) {
            DB::table('movie_actor')->insert([
                'movie_id' => $movie->id,
                'actor_id' => $movieActor
            ]);
        }
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->poster) {
            unlink(storage_path('app\\public\\' . $movie->poster ));
        }
        $movie->delete();
        Alert::success('تهانينا', 'تمت العملية بنجاح');
        return back();
    }
}
