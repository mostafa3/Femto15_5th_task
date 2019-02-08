<?php

namespace App\Policies;

use App\User;
use App\Inventory;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryPolicy
{
    use HandlesAuthorization;


    public function view_all(User $user){
      // only the admin can view all inventories
      return $user->is_admin();
    }

    public function view_his_own(User $user){
      // but the manager can view his inventory
      return $user->is_manager();
    }


    public function create(User $user)
    {
      // only the admin can create new inventory
        return $user->is_admin();
    }


    public function update(User $user)
    {
      // only the admin can update inventory
        return $user->is_admin();
    }


    public function delete(User $user)
    {
      // only the admin can delete inventory
      return $user->is_admin();
    }



}
