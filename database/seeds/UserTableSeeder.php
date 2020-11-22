<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Administrator System',
            'username' => 'root',
            'email' => 'root@simpleapp.id',
            'email_verified_at' => now(),
            'password' => bcrypt('root')
        ]);
    }
}
