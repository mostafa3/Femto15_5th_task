<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','unit','supplier_id'];



    public function supplier(){
      return $this->belongsTo(Supplier::class);
    }



    public function addItem($item){
      $supplier = Supplier::find($item['supplier']);
      $supplier->items()->create($item);
    }





}
