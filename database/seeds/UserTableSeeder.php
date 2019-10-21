<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $faker = Faker\Factory::create();
        for($i=0;$i<5;$i++){
            $avatar_path = '/Users/renaldi/Documents/cobaVueJS/Buku Vue/larashop-api/public/image/users';
            $avatar_fullpath = $faker->image( $avatar_path, 200, 250, 'people', true, true, 'people');
            $avatar = Str::replaceFirst($avatar_path . '/' , '', $avatar_fullpath);
            $users[$i] = [
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail,
                'password'   => bcrypt('123456'),
                'roles'      => json_encode(['CUSTOMER']),
                'avatar'     => $avatar,
                'status'     => 'ACTIVE',
                'created_at' => Carbon\Carbon::now(),
            ];
        }
        DB::table('users')->insert($users);
        }
}
