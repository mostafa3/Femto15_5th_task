<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Supplier extends Model
{
    protected $fillable = ['name','email','phone','inventory_id','information'];

    public function inventory(){
      return $this->belongsTo(Inventory::class);
    }

    public function items(){
      return $this->hasMany(Item::class);
    }

    // transactions through items
    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Item::class,'supplier_id','item_id');
    }

    public function addSupplier($supplier){
      $inventory = Auth::user()->inventory;
      $inventory->suppliers()->create([
        'name' => $supplier['name'],
        'email' => $supplier['email'],
        'phone' => $supplier['phone'],
        'information' => $supplier['information']
      ]);
    }

}
