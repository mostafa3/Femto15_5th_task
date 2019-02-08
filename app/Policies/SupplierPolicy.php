<?php

namespace App\Policies;

use App\User;
use App\Supplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Supplier $supplier)
    {
      // admin can view any supplier
      // but the manager can view only his suppliers
        return $user->is_admin() || $user->suppliers->contains($supplier->id);
    }

    public function view_all(User $user){
      // only the admin can view all item
      return $user->is_admin();
    }

    public function view_his_own(User $user){
      return $user->is_manager();
    }

    public function create(User $user)
    {
      // only manager can create new supplier
        return $user->is_manager();
    }

    public function update(User $user, Supplier $supplier)
    {
      // only manager can update supplier
      // but only his own suppliers
        return $user->is_manager() && $user->suppliers->contains($supplier->id);
    }

    public function delete(User $user, Supplier $supplier)
    {
      // only manager can delete suppliers
      // but only his own suppliers
        return $user->is_manager() && $user->suppliers->contains($supplier->id);
    }


  
}
