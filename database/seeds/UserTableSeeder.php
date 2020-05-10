<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $user = new User;
          $user->name = 'User';
          $user->email = 'user@mail.com';
          $user->password = bcrypt('12345678');
          $user->save();
          $user->roles()->attach(Role::where('name', 'user')->first());

          $admin = new User;
          $admin->name = 'Admin';
          $admin->email = 'admin@mail.co';
          $admin->password = bcrypt('12345678');
          $admin->save();
          $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
