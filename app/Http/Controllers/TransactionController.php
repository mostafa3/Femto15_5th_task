<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Transaction;

use Auth;

use App\Rules\ValidTransactionType;
use App\Rules\EnoughAmount;
use App\Rules\ValidItem;


class TransactionController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){

        $transactions = Transaction::all();


      return view('transactions.index',compact('transactions'));
    }



    public function create(){


      $items =  Item::all() ;
      return view('transactions.create',compact('items'));
    }

    public function store(Transaction $transaction){

      $transaction->addTransaction(request()->validate([
          'item' => ['required','exists:items,id',new ValidItem],
          'type' => ['required',new ValidTransactionType],
          'amount' => ['required','integer',new EnoughAmount(request('type'),request('item'))],
          'notes' => 'nullable',
        ]));
      return redirect(action('TransactionController@index'))->with('success','Transaction Added!');
    }

}
