<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [];
        $faker = Faker\Factory::create();
        $image_categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food',
        'nature', 'technics', 'transport'];
        for($i=0;$i<25;$i++){
            $title = $faker->sentence(mt_rand(3, 6));
            $title = Str::replaceFirst('.', '', $title);
            $slug = Str::replaceFirst(' ', '-', strtolower($title));
            $category = $image_categories[mt_rand(0, 8)];
            $cover_path = '/Users/renaldi/Documents/cobaVueJS/Buku Vue/larashop-api/public/image/books';
            $cover_fullpath = $faker->image( $cover_path, 300, 500, $category, true, true, $category);
            $cover = Str::replaceFirst($cover_path . '/' , '', $cover_fullpath);
            $books[$i] = [
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->text(255),
                'author' => $faker->name,
                'publisher' => $faker->company,
                'cover' => $cover,
                'price' => mt_rand(1, 10) * 50000,
                'weight' => 0.5,
                'status' => 'PUBLISH',
                'created_at' => Carbon\Carbon::now(),
            ];
        }
        DB::table('books')->insert($books);
    }
}
