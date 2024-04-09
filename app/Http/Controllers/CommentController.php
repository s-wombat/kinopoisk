<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentCreateRequest;

use App\Models\Comment;
use App\Models\Film;

/**
 * Store a newly created resource in storage.
 */
class CommentController extends Controller
{
    public function store(CommentCreateRequest $request)
    {
        $validated = $request->validated();
//        $film = Film::find($validated['film_id']);
//        $filmRating = ($film->rating + $validated['rating'])/2;
//        dd($film);
//        $film->save();
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'film_id' => $validated['film_id'],
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);
        $comment->save();
        return back();
    }
}
