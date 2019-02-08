<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectionToRole
{

    //redirect according roles
    public function handle($request, Closure $next)
    {

        $role = Auth::user()->role->role_name;
        switch ($role) {
          case 'Admin':
            return redirect(action('InventoryController@index'));

          case 'Inventory Manager':
            return redirect(action('InventoryController@show',['inventory'=>Auth::user()->inventory->id]));




      }
        return $next($request);
    }
}
