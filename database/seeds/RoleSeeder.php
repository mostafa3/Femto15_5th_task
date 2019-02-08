<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $roles = [
        [
          'role_name' => 'Admin'
        ],
        [
          'role_name' => 'Inventory Manager'
        ]
      ];
      DB::table('roles')->insert($roles);

    }
}
