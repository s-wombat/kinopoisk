<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmCreateRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::paginate(10);
        return view('films.index', [
            'films' => $films,
        ]);
    }

    public function upload(Request $request)
    {
        $image = $request->file('preview');
        $name = $image->getClientOriginalName();
        $path = $request->file('preview')->storeAs(
            'preview', $name, 'public'
        );
        return view('films.image', compact('path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('films.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmCreateRequest $request)
    {
        dd($request);
        $validated = $request->validated();

        $preview = $request->file('preview');
        $namePreview = $preview->getClientOriginalName();
        $pathPreview = $request->file('preview')->storeAs(
            'preview', $namePreview, 'public'
        );

        $poster = $request->file('poster');
        $namePoster = $poster->getClientOriginalName();
        $pathPoster = $request->file('poster')->storeAs(
            'poster', $namePoster, 'public'
        );

        $film = Film::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'date_release' => $validated['date_release'],
            'preview' => $pathPreview,
            'poster' => $pathPoster,
        ]);
        $film->save();
        $film->categories()->attach($validated['categories']);

        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $categories = $this->getCategories();

        $arr = $film->categories->all();
        $categoriesFilm =[];
        foreach ($arr as $item) {
            $categoriesFilm += [$item->id => $item->name];
        }
        return view('films.edit', compact('film', 'categories', 'categoriesFilm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        $film = Film::find($id);
//        dd($film);
        dd($request);
        $preview = $request->file('preview');
        $namePreview = $preview->getClientOriginalName();
        $pathPreview = $request->file('preview')->storeAs(
            'preview', $namePreview, 'public'
        );
        $validator = $request->validated();
        $preview = $request->file('preview');
        dd($validator);
//        $user = Film::find($id);
//
//
//        $user->name = $validator['name'];
//        $user->description = $validator['description'];
//        $user->date_release = $validator['date_release'];
//        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getCategories(): array
    {
        $categoriesCollection = Category::all()->map(function ($item, $key){
            return [$item->id => $item->name];
        })->all();
        $intermediateArr=array_merge(...$categoriesCollection);
        return array_combine(range(1, count($intermediateArr)), $intermediateArr);
    }
}
