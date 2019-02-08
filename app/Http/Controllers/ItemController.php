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
      // view all items for admin
      // but in case of manager view only his own items
      if(\Gate::allows('view_all',Item::class))
        $items = Item::all();
      elseif(\Gate::allows('view_his_own',Item::class))
        $items =  Auth::user()->items() ;

        return view('items.index',compact('items'));
    }


    public function create()
    {

      
      $this->authorize('create',Item::class);
        $suppliers = Auth::user()->suppliers;

        return view('items.create',compact('suppliers'));
    }

    public function store(Item $item)
    {
      $this->authorize('create',Item::class);
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

      $this->authorize('view',$item);
        return view('items.show',['item'=>$item]);
    }


    public function edit(Item $item)
    {
      $this->authorize('update',$item);
      $suppliers = Auth::user()->suppliers;


        return view('items.edit',compact('item','suppliers'));
    }


    public function update(Item $item)
    {
      $this->authorize('update',$item);
      $item->update(request()->validate([
        'name' => 'required|unique:items,name,'.$item->id,
        'unit' => ['required',new ValidUnit]
      ]));
      return redirect(action('ItemController@index'))->with('success','Item Updated!');
    }


    public function destroy(Item $item)
    {
      $this->authorize('delete',$item);
        $item->delete();
        return redirect(action('ItemController@index'))->with('success','Item Deleted!');
    }
}
