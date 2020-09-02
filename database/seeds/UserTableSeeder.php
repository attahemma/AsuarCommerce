<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->get();
        $userRole = Role::where('name', 'user')->get();

        $admin = User::create([
            'name' => 'Attah Emmanuel',
            'email' => 'attahemma0@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name' => 'Attah Emmanuel',
            'email' => 'emmyattah50@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
