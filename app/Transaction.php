<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['type','amount','item_id','notes'];


    public function item(){
      return $this->belongsTo(Item::class);
    }

    public function addTransaction($transaction){
      $item = Item::find($transaction['item']);
      $item->transactions()->create($transaction);

    }



}
