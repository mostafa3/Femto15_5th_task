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
       // admin can view all transactions
       // but the manager can view only his transactions
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
       // only managers can make transactions
         return $user->is_manager();
     }



}
