<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->email = 'admin1@aston.ac.uk';
        $user->password = bcrypt('Admin1');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->email = 'user1@aston.ac.uk';
        $user->password = bcrypt('User1');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->email = 'user2@aston.ac.uk';
        $user->password = bcrypt('User2');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
