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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->transaction_type === 'add' ? true : $this->item->available() >= $value ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The amount is not enough, only '.$this->item->available() .' '.$this->item->unit.' is available.';
    }
}
