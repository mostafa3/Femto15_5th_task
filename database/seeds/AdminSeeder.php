<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin_role =  App\Role::where('role_name','Admin')->first();
      $admin_role->users()->create([
        'name' => 'admin',
        'email' => 'admin@inventory.com',
        'password' => bcrypt('123456'),
      ]);
    }
}
