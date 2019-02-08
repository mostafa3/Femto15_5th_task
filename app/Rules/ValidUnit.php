<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidUnit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
      // only KG , Liter or Quantity for now
      $units = collect(['KG', 'Liter', 'Quantity']);

      return $units->contains($value);
    }

  
    public function message()
    {
        return 'The measurement unit must be valid use only KG, Liter or Quantity.';
    }
}
