<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmCreateRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validated();

        $preview = $request->file('preview');
        $namePreview = $preview->getClientOriginalName();
        $pathPreview = Storage::putFileAs('preview', $request->file('preview'), $namePreview);

        $poster = $request->file('poster');
        $namePoster = $poster->getClientOriginalName();
        $pathPoster = Storage::putFileAs('poster', $request->file('poster'), $namePoster);

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
    public function update(FilmUpdateRequest $request, string $id)
    {
        $validator = $request->validated();
        $film = Film::find($id);
        $preview = $request->file('preview');
        if ($preview) {
            Storage::delete($film->preview);
            $namePreview = $preview->getClientOriginalName();
            $pathPreview = Storage::putFileAs('preview', $request->file('preview'), $namePreview);
        } else {
            $pathPreview = $film->preview;
        }

        $poster = $request->file('poster');
        if ($poster) {
            Storage::delete($film->poster);
            $namePoster = $poster->getClientOriginalName();
            $pathPoster = Storage::putFileAs('poster', $request->file('poster'), $namePoster);
        } else {
            $pathPoster = $film->poster;
        }

        $film = Film::find($id);
        $film->name = $validator['name'];
        $film->description = $validator['description'];
        $film->date_release = $validator['date_release'];
        $film->preview = $pathPreview;
        $film->poster = $pathPoster;
        $film->save();

        $film->categories()->sync($validator['categories']);

        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        Storage::delete([$film->preview, $film->poster]);
        $film->delete();

        return redirect()->route('films.index');
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
