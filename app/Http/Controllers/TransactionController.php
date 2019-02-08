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
      // his own for manager and all transactions for admin
      if(\Gate::allows('view_all',Transaction::class))
        $transactions = Transaction::all();
      elseif(\Gate::allows('view_his_own',Transaction::class))
        $transactions =  Auth::user()->transactions() ;

      return view('transactions.index',compact('transactions'));
    }



    public function create(){
      // items for this manager
      $this->authorize('create',Transaction::class);
      $user = Auth::user();
      $items =  $user->items() ;
      return view('transactions.create',compact('items'));
    }

    public function store(Transaction $transaction){
      $this->authorize('create',Transaction::class);
      $transaction->addTransaction(request()->validate([
          'item' => ['required','exists:items,id',new ValidItem],
          'type' => ['required',new ValidTransactionType],
          'amount' => ['required','integer',new EnoughAmount(request('type'),request('item_id'))],
          'notes' => 'nullable',
        ]));
      return redirect(action('TransactionController@index'))->with('success','Transaction Added!');
    }

}
