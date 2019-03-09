<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        User::create([
          'name' => 'Admin',
          'email' => 'admin@email.com',
          'password' => bcrypt('password'),
          'isAdmin' => 1,
          'isPatient' => 0
        ]);


    }
}
