<?php

namespace App\Policies;

use App\User;
use App\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Item $item)
    {
        // admin can view any item
        // but the manager can view only his items
        return $user->is_admin() || $user->items()->contains($item->id);
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
      // only manager can create new item
        return $user->is_manager();
    }


    public function update(User $user, Item $item)
    {
      // only manager can update items
      // but only his own items
        return $user->is_manager() && $user->items()->contains($item->id);
    }

    public function delete(User $user, Item $item)
    {
      // only manager can delete items
      // but only his own items
        return $user->is_manager() && $user->items()->contains($item->id);
    }


}
