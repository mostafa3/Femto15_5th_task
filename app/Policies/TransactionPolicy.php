<?php

namespace App\Policies;

use App\User;
use App\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;



     public function view(User $user, Transaction $transaction)
     {
         return $user->is_admin() || $user->transactions()->contains($transaction->id);
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



}
