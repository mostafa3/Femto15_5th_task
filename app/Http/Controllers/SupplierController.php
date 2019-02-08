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
        $suppliers = Supplier::all();

        return view('suppliers.index',compact('suppliers'));
    }



    public function create()
    {
      
        return view('suppliers.create');
    }


    public function store(Supplier $supplier)
    {

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


        return view('suppliers.show',['supplier'=>$supplier]);
    }


    public function edit(Supplier $supplier)
    {

        return view('suppliers.edit',['supplier'=>$supplier]);
    }


    public function update(Supplier $supplier)
    {

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

        $supplier->delete();
        return redirect(action('SupplierController@index'))->with('success','Supplier Deleted!');
    }
}
