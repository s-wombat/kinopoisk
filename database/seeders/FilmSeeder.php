<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            'name' => 'Пацаны',
            'description' => 'Действие сериала разворачивается в мире, где люди, обладающие сверхспособностями, являются настоящими знаменитостями и всеобщими любимцами.',
            'date_release' => '2019-07-26',
            'rating' => 7,
            'preview' => 'preview/boys.png',
            'poster' => 'posters/boys.png'
        ]);
        DB::table('films')->insert([
            'name' => 'Мандалорец',
            'description' => 'Действие переносит зрителя на пять лет вперед после падения Галактической Империи и рассказывает историю молчаливого наемника, зарабатывающего на жизнь отловом беглых преступников в самых отдаленных звездных системах.',
            'date_release' => '2019-11-12',
            'rating' => 8,
            'preview' => 'preview/mandalorian.png',
            'poster' => 'posters/mandalorian.png'
        ]);
    }
}
