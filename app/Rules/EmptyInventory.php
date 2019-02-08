<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Inventory;

class EmptyInventory implements Rule
{



    public function __construct()
    {

    }


    public function passes($attribute, $value)
    {
      // when assign new manager to inventory
      // the inventory must has no manager

        $inventory = Inventory::find($value);
          return $inventory ? !$inventory->inventory_manager_id  : false;
    }


    public function message()
    {
        return 'The inventory has manager.';
    }
}
