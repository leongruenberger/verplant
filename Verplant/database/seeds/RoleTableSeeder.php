<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = new Role();
    $role_admin->name= 'admin';
    $role_admin->description ='Administrator';
    $role_admin->save();

    $role_user = new Role();
    $role_user->name = 'user';
    $role_user->description ='Benutzer';
    $role_user->save();

    $role_author = new Role();
    $role_author->name= 'editor';
    $role_author->description ='Autor';
    $role_author->save();

    
  }
}
