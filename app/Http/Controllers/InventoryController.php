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

        $inventories = Inventory::all();

        return view('inventory.index',compact('inventories'));
    }


    public function create()
    {
        return view('inventory.create');
    }


    public function store()
    {
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

        return view('inventory.edit',['inventory'=>$inventory]);
    }


    public function update(Inventory $inventory)
    {
        $inventory->update(
           request()->validate(['name' => 'required'])
         );

        return redirect(action('InventoryController@index'))->with('success','Inventory Updated !');
    }


    public function destroy(Inventory $inventory)
    {

        $inventory->delete();

        return redirect(action('InventoryController@index'))->with('success','Inventory Deleted !');
    }



}
