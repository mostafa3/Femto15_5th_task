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


    public function passes($attribute, $value)
    {
      // this suppliers belongs to this manager
        return collect(Auth::user()->suppliers)->pluck('id')->contains($value);
    }

    
    public function message()
    {
        return 'The supplier is not valid.';
    }
}
