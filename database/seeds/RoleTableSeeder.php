<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Role;
      $role->truncate();
      $roleArray = [
            [
              'name' => 'superadmin',
              'label' => 'Super Admin'
           ],
           [
             'name' => 'staff',
             'label' => 'Staff'
           ],
           [
             'name' => 'teacher',
             'label' => 'Teacher'
           ],
           [
             'name' => 'teamlead',
             'label' => 'Team Lead'
           ],
           [
             'name' => 'teammember',
             'label' => 'Team Member'
           ]
          ];


          foreach ($roleArray as $getRole) {
            $role = new Role;
            $role->name  = $getRole['name'];
            $role->label  = $getRole['label'];
            $role->save();
          }
    }
}
