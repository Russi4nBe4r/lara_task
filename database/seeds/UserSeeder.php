<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $user = new User();
	    $user->name = 'name#1';
	    $user->sur_name = 'sur_name#1';
	    $user->last_name = 'last_name#1';
	    $user->phone = 1231512;
	    $user->save();

        $user = new User();
        $user->name = 'name#2';
        $user->sur_name = 'sur_name#2';
        $user->last_name = 'last_name#2';
        $user->phone = 11236192;
        $user->save();

        $user = new User();
        $user->name = 'name#3';
        $user->sur_name = 'sur_name#3';
        $user->last_name = 'last_name#3';
        $user->phone = 4687687357;
        $user->save();
    }
}
