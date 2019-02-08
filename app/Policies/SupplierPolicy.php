<?php

namespace App\Policies;

use App\User;
use App\Supplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Supplier  $supplier
     * @return mixed
     */
    public function view(User $user, Supplier $supplier)
    {
        return $user->is_admin() || $user->suppliers->contains($supplier->id);
    }

    public function view_all(User $user){
      return $user->is_admin();
    }

    public function view_his_own(User $user){
      return $user->is_manager();
    }

    public function create(User $user)
    {
        return $user->is_manager();
    }

    /**
     * Determine whether the user can update the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Supplier  $supplier
     * @return mixed
     */
    public function update(User $user, Supplier $supplier)
    {
        return $user->is_manager() && $user->suppliers->contains($supplier->id);
    }

    public function delete(User $user, Supplier $supplier)
    {
        return $user->is_manager() && $user->suppliers->contains($supplier->id);
    }


    public function restore(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Supplier  $supplier
     * @return mixed
     */
    public function forceDelete(User $user, Supplier $supplier)
    {
        //
    }
}
