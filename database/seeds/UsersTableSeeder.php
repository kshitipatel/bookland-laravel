<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'Kshiti Patel',
        	'email' => 'kshitipatel1999@gmail.com',
        	'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/kshiti.png',
            'about' => 'Hello there I am Kshiti Patel.'

        ]);
    }
}
