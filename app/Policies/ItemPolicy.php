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
        return $user->is_admin() || $user->items()->contains($item->id);
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


    public function update(User $user, Item $item)
    {
        return $user->is_manager() && $user->items()->contains($item->id);
    }

    public function delete(User $user, Item $item)
    {
        return $user->is_manager() && $user->items()->contains($item->id);
    }


}
