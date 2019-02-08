<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTransactionType implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function passes($attribute, $value)
    {
      // only add or consume for now
      $types = collect(['add', 'consume']);

      return $types->contains($value);
    }


    public function message()
    {
        return 'You can only add or consume items .';
    }
}
