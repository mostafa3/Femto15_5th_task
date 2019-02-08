<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Item;

class EnoughAmount implements Rule
{

    private $item;
    private $transaction_type;

    public function __construct($transaction_type, $item_id)
    {
        $this->item = Item::find($item_id);
        $this->transaction_type = $transaction_type;
    }


    public function passes($attribute, $value)
    {
      // when makeing transaction on specific item
      // manager can add amount at any time
      // but when consuming , the amount should be enough to commit this transaction
        return $this->transaction_type === 'add' ? true : $this->item->available() >= $value ;
    }

  
    public function message()
    {
        return 'The amount is not enough, only '.$this->item->available() .' '.$this->item->unit.' is available.';
    }
}
