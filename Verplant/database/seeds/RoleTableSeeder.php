<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  public function run()
  {
    DB::table(‘roles’)->insert([
      [‘name’ => ‘admin’],
      [‘name’ => ‘author’],
      [‘name’ => ‘user’],
     ]);
  }
}
