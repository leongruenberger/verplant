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
        $role_admin = Role::where(‘name’, ‘admin’)->first();
        $role_user  = Role::where(‘name’, ‘user’)->first();
        $role_author = Role::where(‘name’, ‘author’)->first();
        
        $admin = new User();
        $admin->name = ‘admin’;
       //$admin->email = ‘admin@example.com’;
        $admin->password = bcrypt(‘passwort’);
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = ‘user’;
        //$user->email = ‘user@example.com’;
        $user->password = bcrypt(‘passwort’);
        $user->save();
        $user->roles()->attach($role_user);

        $author = new User();
        $author->name = ‘author’;
        //$author->email = ‘author@example.com’;
        $author->password = bcrypt(‘passwort’);
        $author->save();
        $author->roles()->attach($role_author);
    }
}
