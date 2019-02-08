<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Inventory;

class EmptyInventory implements Rule
{



    public function __construct()
    {

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
      // the inventory must has no manager
        $inventory = Inventory::find($value);
          return $inventory ? !$inventory->inventory_manager_id  : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The inventory has manager, delete the manager first then attach a new one.';
    }
}
