<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Supplier;

class SupplierController extends Controller
{


    public function __construct(){
      $this->middleware('auth');
    }

    public function index()
    {
      // view all suppliers for admin
      // but in case of manager view only his own suppliers
      if(\Gate::allows('view_all',Supplier::class))
        $suppliers = Supplier::all();
      elseif(\Gate::allows('view_his_own',Supplier::class))
        $suppliers =  Auth::user()->suppliers ;
        // $suppliers = collect([]);
        return view('suppliers.index',compact('suppliers'));
    }



    public function create()
    {
      $this->authorize('create',Supplier::class);
        return view('suppliers.create');
    }


    public function store(Supplier $supplier)
    {
      $this->authorize('create',Supplier::class);

      $supplier->addSupplier(request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:suppliers',
        'phone' => 'required|numeric|min:6|unique:suppliers',
        'information' => 'nullable'
      ]));

      return redirect(action('SupplierController@index'))->with('success','Supplier Created !');
    }


    public function show(Supplier $supplier)
    {


      $this->authorize('view',$supplier);
        return view('suppliers.show',['supplier'=>$supplier]);
    }


    public function edit(Supplier $supplier)
    {

      $this->authorize('update',$supplier);
        return view('suppliers.edit',['supplier'=>$supplier]);
    }


    public function update(Supplier $supplier)
    {

      $this->authorize('update',$supplier);
      $supplier->update(request()->validate([
        'name' => 'required',
        'email' => ['required','email','unique:suppliers,email,'.$supplier->id],
        'phone' => ['required','min:6','unique:suppliers,phone,'.$supplier->id],
        'information' => 'nullable'
      ]));

      return redirect(action('SupplierController@index'))->with('success','Supplier Updated !');
    }


    public function destroy(Supplier $supplier)
    {
      
      $this->authorize('delete',$supplier);
        $supplier->delete();
        return redirect(action('SupplierController@index'))->with('success','Supplier Deleted!');
    }
}
