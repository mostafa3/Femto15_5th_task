<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;

class ValidSupplier implements Rule
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
        return collect(Auth::user()->suppliers)->pluck('id')->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The supplier is not valid.';
    }
}
