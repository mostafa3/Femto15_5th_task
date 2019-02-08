<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryManagerPolicy
{
    use HandlesAuthorization;


    public function view(User $user, User $model)
    {
      // the authenticated must be admin or the same manager
      // the requested user must be manager
      return ($user->is_admin() || $user->id == $model->id) && $model->role->role_name == 'Inventory Manager' ;
    }

    public function update(User $user, User $model)
    {
      // the authenticated must be admin or the same manager
      // the updated user must be manager
      return ($user->is_admin() || $user->id == $model->id) && $model->role->role_name == 'Inventory Manager' ;
    }


    public function full_access(User $user){
      return $user->is_admin();
    }

    public function view_all(User $user){
      return $user->is_admin();
    }

    public function view_himself(User $user){
      // any manager can view his profile
      return $user->is_manager() ;
    }

    public function create(User $user){
      // only the admin can add new manager
      return $user->is_admin();
    }

    public function delete(User $user, User $model){
      /// the authenticated must be admin
      // the updated user must be manager 
        return $user->is_admin() && $model->role->role_name == 'Inventory Manager' ;

    }




}
