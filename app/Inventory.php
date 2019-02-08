<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Inventory extends Model
{
    protected $fillable = ['name'];


    public function manager(){
      return $this->belongsTo(User::class,'inventory_manager_id');
    }

    public function suppliers(){
      return $this->hasMany(Supplier::class);
    }

    // has many items through supplier
    public function items()
    {
        return $this->hasManyThrough(Item::class, Supplier::class,'inventory_id','supplier_id');
    }



}
