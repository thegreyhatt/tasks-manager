<?php

use App\User;
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
        $user = new User;
        $user->name = "Ervin Benez";
        $user->email = "ervinbenez@gmail.com";
        $user->password = bcrypt('mentos88');
        $user->save();
    }
}
