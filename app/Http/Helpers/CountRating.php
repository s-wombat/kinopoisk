<?php

namespace App\Http\Helpers;

use App\Models\Film;

class CountRating
{
    public function __invoke()
    {
        $films = Film::all();

        foreach ($films as $film) {
            $comments = $film->comments;

            if ($comments->count() > 0) {
                $sum = 0;
                foreach ($comments as $comment) {
                    $sum += $comment->rating;
                }

                $film->rating = floor($sum / $comments->count());
                $film->save();
            }
        }
    }
}