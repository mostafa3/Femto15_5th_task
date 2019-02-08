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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      $units = collect(['KG', 'Liter', 'Quantity']);

      return $units->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The measurement unit must be valid use only KG, Liter or Quantity.';
    }
}
