<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['name'];

    public function manager(){
      return $this->belongsTo(User::class,'inventory_manager_id');
    }

    
}
