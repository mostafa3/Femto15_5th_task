<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryManagerPolicy
{
    use HandlesAuthorization;


    public function view(User $user, User $model)
    {
      return ($user->is_admin() || $user->id == $model->id) && $model->role->role_name != 'Admin' ;
    }

    public function update(User $user, User $model)
    {
      return ($user->is_admin() || $user->id == $model->id) && $model->role->role_name != 'Admin' ;
    }


    public function full_access(User $user){
      return $user->is_admin();
    }

    public function view_all(User $user){
      return $user->is_admin();
    }

    public function view_himself(User $user){
      return $user->is_manager() ;
    }

    public function create(User $user){
      return $user->is_admin();
    }

    public function delete(User $user, User $model){

        return $user->is_admin() && $model->role->role_name != 'Admin' ;

    }




}
