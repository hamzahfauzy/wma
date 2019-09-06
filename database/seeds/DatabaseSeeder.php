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
    	User::create([
    		'name' => 'admin',
    		'email' => 'admin@admin.com',
    		'password' => bcrypt('password')
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
