<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Inventory;



class InventoryController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
      // inventories for this manager not all inventories
      // if admin get all inventories

        if(\Gate::allows('view_all',Inventory::class))
            $inventories = Inventory::all();
        elseif(\Gate::allows('view_his_own',Inventory::class))
            $inventories = collect([Auth::user()->inventory]);

        return view('inventory.index',compact('inventories'));
    }


    public function create()
    {
        $this->authorize('create',Inventory::class);
        return view('inventory.create');
    }


    public function store()
    {
      $this->authorize('create',Inventory::class);

        Inventory::create(request()->validate([
            'name'=>'required'
          ]));

        return redirect(action('InventoryController@index'))->with('success','Inventory Created !');
    }


    public function show(Inventory $inventory)
    {
        return view('inventory.show',['inventory'=>$inventory]);
    }


    public function edit(Inventory $inventory)
    {
      $this->authorize('update',Inventory::class);
        return view('inventory.edit',['inventory'=>$inventory]);
    }


    public function update(Inventory $inventory)
    {
      $this->authorize('update',Inventory::class);

        $inventory->update(
           request()->validate(['name' => 'required'])
         );

        return redirect(action('InventoryController@index'))->with('success','Inventory Updated !');
    }


    public function destroy(Inventory $inventory)
    {
        $this->authorize('delete',Inventory::class);

        $inventory->delete();

        return redirect(action('InventoryController@index'))->with('success','Inventory Deleted !');
    }



}
