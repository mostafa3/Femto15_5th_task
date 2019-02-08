<?php

namespace App\Policies;

use App\User;
use App\Inventory;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryPolicy
{
    use HandlesAuthorization;



    public function view_all(User $user){
      return $user->is_admin();
    }

    public function view_his_own(User $user){
      return $user->is_manager();
    }


    public function create(User $user)
    {
        return $user->is_admin();
    }


    public function update(User $user)
    {
        return $user->is_admin();
    }


    public function delete(User $user)
    {
      return $user->is_admin();
    }



}
