<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(TeachersTableSeeder::class);
         $this->call(AdvisorsTableSeeder::class);
         $this->call(StudentsTableSeeder::class);
         $this->call(PostTableSeeder::class);
         $this->call(Post_forTableSeeder::class);
    }
}
