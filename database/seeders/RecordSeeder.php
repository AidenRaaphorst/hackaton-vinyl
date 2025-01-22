<?php

namespace Database\Seeders;

use App\Models\Record;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rockId = Category::where('slug', 'rock')->first()->id;
        $jazzId = Category::where('slug', 'jazz')->first()->id;
        $classicalId = Category::where('slug', 'classical')->first()->id;
        $popId = Category::where('slug', 'pop')->first()->id;

        $records = [
            [
                'title' => 'Dark Side of the Moon',
                'artist' => 'Pink Floyd',
                'description' => 'The iconic 1973 progressive rock album',
                'price' => 29.99,
                'stock' => 5,
                'condition' => 'new',
                'release_year' => 1973,
                'category_id' => $rockId,
                'cover_image' => 'Dark_Side_of_the_Moon.png',
            ],
            [
                'title' => 'Kind of Blue',
                'artist' => 'Miles Davis',
                'description' => 'The best-selling jazz record of all time',
                'price' => 24.99,
                'stock' => 3,
                'condition' => 'new',
                'release_year' => 1959,
                'category_id' => $jazzId,
                'cover_image' => 'Kind_of_Blue.jpg',
            ],
            [
                'title' => 'The Four Seasons',
                'artist' => 'Antonio Vivaldi',
                'description' => 'A baroque masterpiece (1725), remastered recording',
                'price' => 19.99,
                'stock' => 2,
                'condition' => 'new',
                'release_year' => 1955,
                'category_id' => $classicalId,
                'cover_image' => 'Antonio_Vivaldi.jpg',
            ],
            [
                'title' => 'Thriller',
                'artist' => 'Michael Jackson',
                'description' => 'The best-selling album of all time',
                'price' => 27.99,
                'stock' => 10,
                'condition' => 'new',
                'release_year' => 1982,
                'category_id' => $popId,
                'cover_image' => 'Thriller.png',
            ],
        ];

        foreach ($records as $record) {
            Record::create($record);
        }
    }
}
