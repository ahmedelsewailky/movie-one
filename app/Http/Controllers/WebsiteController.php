<?php

namespace App\Http\Controllers;

class WebsiteController extends Controller
{
    /**
     * Display website index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $slider_movies = \App\Models\Movie::orderByDesc('id')->take(5)->get();

        $tvshows = \App\Models\TvshowEpisode::orderByDesc('id')->take(5)->get();

        $episodes = \App\Models\SeriesEpisode::orderByDesc('id')->take(10)->get();

        $movies = new \App\Models\Movie;

        if (request()->has('tag')) {
            $categoryId = \App\Models\Category::where('slug', request()->get('tag'))->first()->id;
            $movies = $movies->whereCategoryId($categoryId);
        }

        $movies = $movies->orderByDesc('id')->paginate(18);

        return view('index', get_defined_vars());
    }

    /**
     * Get all works for specific actor
     *
     * @param string $slug
     * @return void
     */
    public function actors(string $slug)
    {
        $actor = \App\Models\Actor::where('slug', $slug)->first();
        return view('web_pages.actor-works', compact('actor'));
    }

    /**
     * Display single movie post page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function movie(string $slug): \Illuminate\View\View
    {
        $movie = \App\Models\Movie::where('slug', $slug)->first();
        return view('movies.single', compact('movie'));
    }

    /**
     * Display single series post page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function series(string $slug): \Illuminate\View\View
    {
        return view('series.single', [
            'series' => \App\Models\Series::where('slug', $slug)->first()
        ]);
    }

    /**
     * Display one episode for series.
     *
     * @param string $slug for episode
     * @param integer $id for series
     * @return \Illuminate\View\View
     */
    public function seriesEpisode(string $slug, int $id): \Illuminate\View\View
    {
        return view('series.single-episode', [
            'episode' => \App\Models\SeriesEpisode::find($id)->first(),
            'series' => \App\Models\Series::where('slug', $slug)->first()
        ]);
    }

    /**
     * Get all posts based on it's category.
     * 
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function category(string $slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->first();
        $posts = \App\Models\Movie::whereCategoryId($category->id)->get();
        if ($posts->count() > 0) {
            $posts = $posts;
        } else {
            $posts = \App\Models\Series::whereCategoryId($category->id)->get();
        }
        return view('web_pages.category-posts', compact('posts', 'category'));
    }

    /**
     * Get all posts based on user searching key words.
     * 
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function search()
    {
        $key = request()->get('q');
        if ($key) {
            $is_movie = \App\Models\Movie::where('title', 'like', '%' . $key . '%')->get();
            if ($is_movie->count() > 0) {
                $posts = $is_movie;
            } else {
                $posts = \App\Models\Series::where('title', 'like', '%' . $key . '%')->get();
            }
            return view('web_pages.search', compact('posts'));
        }
        return redirect()->route('website');
    }
}
