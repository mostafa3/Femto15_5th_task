<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Supplier;
use App\Item;

use App\Rules\ValidUnit;
use App\Rules\ValidSupplier;

class ItemController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::all();

        return view('items.index',compact('items'));
    }


    public function create()
    {


        $suppliers = Auth::user()->suppliers;

        return view('items.create',compact('suppliers'));
    }

    public function store(Item $item)
    {
        $item->addItem( request()->validate([
            'name' => 'required|unique:items,name',
            'unit' => ['required',new ValidUnit],
            'supplier' => ['required','exists:suppliers,id',new ValidSupplier],
          ])
        );


        return redirect(action('ItemController@index'))->with('success','Item Created!');

    }

    public function show(Item $item)
    {


        return view('items.show',['item'=>$item]);
    }


    public function edit(Item $item)
    {
      $suppliers = Auth::user()->suppliers;


        return view('items.edit',compact('item','suppliers'));
    }


    public function update(Item $item)
    {

      $item->update(request()->validate([
        'name' => 'required|unique:items,name,'.$item->id,
        'unit' => ['required',new ValidUnit]
      ]));
      return redirect(action('ItemController@index'))->with('success','Item Updated!');
    }


    public function destroy(Item $item)
    {
    
        $item->delete();
        return redirect(action('ItemController@index'))->with('success','Item Deleted!');
    }
}
