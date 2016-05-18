<?php

use Illuminate\Database\Seeder;
use App\User;

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
      $user->truncate();
      $userArray = [
            [
              'name' => 'Superadmin User',
              'email' => 'superadmin@gmail.com',
              'role_id' => '1',
              'password' => Hash::make('123456')
           ],
           [
             'name' => 'Staff User',
             'email' => 'staffuser@gmail.com',
             'role_id' => '2',
             'password' => Hash::make('123456')
          ]
          ];


          foreach ($userArray as $getUser) {
            $user = new User;
            $user->name  = $getUser['name'];
            $user->email = $getUser['email'];
            $user->role_id = $getUser['role_id'];
            $user->password = $getUser['password'];
            $user->save();
          }
    }
}
