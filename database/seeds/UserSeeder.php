<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User;
        $user->name = 'Gene Ramirez';
        $user->email = 'generamirez@sandbox.com';
        $user->password = Hash::make('gcfrsandbox');
        $user->role = 'customer';
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role' => $data['role'],
        // ]);
        $user->save();
    }
}
