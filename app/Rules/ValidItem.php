<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Auth;

class ValidItem implements Rule
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
      // this item belongs to this manager
        return collect(Auth::user()->items())->pluck('id')->contains($value);
    }


    public function message()
    {
        return 'The item is not valid.';
    }
}
