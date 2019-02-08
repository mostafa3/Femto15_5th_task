<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Inventory;

use Auth;

use App\Rules\EmptyInventory;

class InventoryManagerController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {

          $managers = Role::where('role_name','Inventory Manager')->first()->users;


        return view('managers.index',compact('managers'));
    }



    public function create()
    {

        $inventories = Inventory::where('inventory_manager_id',NULL)->get();
        return view('managers.create',compact('inventories'));
    }


    public function store(User $manager)
    {

      $inventory = Inventory::find(request()['inventory']);

       $manager = $manager->addManager( request()->validate([
        'name' => 'required',
        'inventory' => ['required','exists:inventories,id',new EmptyInventory],
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
      ]));


        return redirect(action('InventoryManagerController@index'))->with('success','Manager Created !');
    }


    public function show(User $inventory_manager)
    {

        return   view('managers.show',['inventory_manager'=>$inventory_manager]) ;
    }


    public function edit(User $inventory_manager)
    {


      $inventories = Inventory::where('inventory_manager_id',NULL)->get();
        return  view('managers.edit',compact('inventory_manager','inventories')) ;
    }


    public function update(User $inventory_manager)
    {
    
      $inventory_manager->edit(
        request()->validate([
          'name' => 'required',
          'email' => ['required','email','unique:users,email,'.$inventory_manager->id],
          'password' => 'nullable|min:6|confirmed'
        ])
      );

      return redirect(action('InventoryManagerController@show',['inventory_manager'=>$inventory_manager]))->with('success','Manager Updated !');

    }


    public function destroy(User $inventory_manager)
    {
      $inventory_manager->delete();
      return redirect(action('InventoryManagerController@index'))->with('success','Manager Deleted!');
    }
}
