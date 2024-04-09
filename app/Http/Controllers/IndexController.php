<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $films = Film::paginate(10);

        return view('main.home', compact('films'));
    }

    public function show(string $id)
    {
        $film = Film::find($id);
        $rating = range(1, 10);
        array_unshift($rating, 'Оценка');

        $comments = $film->comments;
        foreach ($comments as $comment) {
            $user = User::find($comment->user_id);
            $comment->user = $user->name;
            $comment->email = $user->email;
        }

        return view('main.film', compact('film', 'rating', 'comments'));
    }
}
