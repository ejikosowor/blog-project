<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            ['username' => 'admin1','email' => $faker->unique()->safeEmail, 'password' => bcrypt('904310813'), 'role_id' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['username' => 'editor1','email' => $faker->unique()->safeEmail, 'password' => bcrypt('904310813'), 'role_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['username' => 'author1','email' => $faker->unique()->safeEmail, 'password' => bcrypt('904310813'), 'role_id' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['username' => 'contributor1','email' => $faker->unique()->safeEmail, 'password' => bcrypt('904310813'), 'role_id' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
    }
}