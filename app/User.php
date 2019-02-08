<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    // check admin role
    public function is_admin(){
        return $this->role->role_name === 'Admin';
    }

    // check manager role
    public function is_manager(){
        return $this->role->role_name === 'Inventory Manager';
    }

    // relations

    public function role(){
      return $this->belongsTo(Role::class);
    }

    public function inventory(){
      return $this->hasOne(Inventory::class,'inventory_manager_id');
    }


    // suppliers through inventory
    public function suppliers()
    {
        return $this->hasManyThrough(Supplier::class, Inventory::class,'inventory_manager_id','inventory_id');

    }

    // items through inventory
    public function items(){
      return $this->inventory->items;
    }

    // manager has many suppliers
    // and suppliers has many transactions
    // so collect all this transaction in one array
    public function transactions(){
      $transactions = collect();
      foreach( $this->items() as $item ){
        $transactions->push($item->transactions) ;
      }

      return $transactions->flatten();
    }



    public function addManager($manager){
      $manager_role =  Role::where('role_name','Inventory Manager')->first();

      $user = $manager_role->users()->create([
        'name' => $manager['name'],
        'email' => $manager['email'],
        'password' => bcrypt($manager['password']),
      ]);

      $inventory = Inventory::find($manager['inventory']);
      $user->inventory()->save($inventory);

      return $user;
    }


    public function edit($manager){

        $manager['password'] = $manager['password'] ? bcrypt($manager['password']) : $this->password;

      $this->update($manager);




    }






}
