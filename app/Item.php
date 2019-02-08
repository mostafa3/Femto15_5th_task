<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','unit','supplier_id'];



    public function supplier(){
      return $this->belongsTo(Supplier::class);
    }

    public function transactions(){
      return $this->hasMany(Transaction::class);
    }


    public function addItem($item){
      $supplier = Supplier::find($item['supplier']);
      $supplier->items()->create($item);
    }

    // get all the added transactions
    public function add_transactions(){
      return $this->transactions->filter(function($transaction, $key){
        return $transaction->type == 'add';
      });

    }

    // get all the consumed transactions
    public function consume_transactions(){
      return $this->transactions->filter(function($transaction, $key){
        return $transaction->type == 'consume';
      });

    }

    // show the existing amont of item in inventory
    public function available(){

      $added = $this->add_transactions();

      $consumed = $this->consume_transactions();

      return $added->sum('amount') - $consumed->sum('amount');


    }



}
