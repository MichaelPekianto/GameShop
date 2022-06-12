<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('game_genres')->insert([
            'genre' => 'FPS',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'Sandbox',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'Survival',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'RPG',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'RTS',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'Arcade',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'MMORPG',
        ]);
        \DB::table('game_genres')->insert([
            'genre' => 'Open World',
        ]);
    }
}
