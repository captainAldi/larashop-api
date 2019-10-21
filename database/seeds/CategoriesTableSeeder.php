<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $faker = Faker\Factory::create();
        $image_categories = ['abstract', 'animals', 'business', 'cats', 'city', 'food',
        'nature', 'technics', 'transport'];
        for($i=0;$i<8;$i++){
            $name = $faker->unique()->word();
            $name = Str::replaceFirst('.', '', $name);
            $slug = Str::replaceFirst(' ', '-', strtolower($name));
            $category = $image_categories[mt_rand(0, 8)];
            $image_path = '/Users/renaldi/Documents/cobaVueJS/Buku Vue/larashop-api/public/image/categories';
            $image_fullpath = $faker->image( $image_path, 500, 300, $category, true, true, $category);
            $image = Str::replaceFirst($image_path . '/' , '', $image_fullpath);
            $categories[$i] = [
                'name' => $name,
                'slug' => $slug,
                'image' => $image,
                'status' => 'PUBLISH',
                'created_at' => Carbon\Carbon::now(),
            ];
        }
        DB::table('categories')->insert($categories);
        }
}
