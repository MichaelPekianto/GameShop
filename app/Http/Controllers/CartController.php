<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add($id){
        $search=Cart::where('user_id','=',Auth::user()->id)->where('game_id','=',$id)->first();
        if($search==null){
        //    $cart= session('cart');
        //    $cart[Auth::user()->id]=[
        //         'quantity' => '1',
        //         'game_id' => $id,
        //         'user_name' => auth()->user()->name,
        //    ];
        //    session(["cart"=>$cart]);
        //     Session::push('cart',[
        //         'quantity' => '1',
        //         'game_id' => $id,
        //         'user_id' => auth()->user()->id,
        //     ]);
        Cart::create([
            'quantity'=>'1',
            'game_id'=> $id,
            'user_id'=>auth()->user()->id,
        ]);
    }else{
        $currCart=$search;
        $currCart->quantity+=1;
        $currCart->save();
        // $request->session()->increment('qu')
    }
        return redirect('/');
    }
    public function index(){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data=Cart::where('user_id','=',Auth::user()->id)->get();
        return view('cart',compact('data', 'cartdata'));
    }
    public function updatecart(Request $request, $id){
        if($request->quantity!='0'){
        $currcart = Cart::find($id);
        $currcart->quantity =$request->quantity;
            $currcart->save();
    }else{
            Cart::find($id)->delete();
        }
        return back();
    }
    public function deletecart($id){
        Cart::where('id', '=', $id)->first()->delete();
        return back();
    }
    public function transaction(){
        $data =Cart::where('user_id', '=', auth()->user()->id)->get();
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->save();
        for($i=0; $i<count($data);$i++){
            TransactionDetail::create([
                'quantity' => $data[$i]->quantity,
                'game_id' => $data[$i]->game_id,
                'user_id' => auth()->user()->id,
                'transaction_id' => $transaction->id
            ]);
        }
        Cart::where('user_id', '=', auth()->user()->id)->delete();
        return redirect('/');
    }
    public function history(){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data = Transaction::join('transaction_details', 'transaction_details.transaction_id','=', 'transactions.id')

        ->select('transactions.id','transactions.created_at',DB::raw('SUM(transaction_details.quantity) as totalitem'))
            ->where('transactions.user_id', '=', Auth::user()->id)
        ->groupBy('transactions.id', 'transactions.created_at')->get();

        return view('transaction',compact('data', 'cartdata'));
    }
    public function transactiondetails($id){

            $cartdata = Cart::where('user_id', '=', Auth::user()->id)->get();

        $data = TransactionDetail::where('transaction_id','=', $id)->get();
        $data2 = Transaction::find($id);
        return view('transactiondetails',compact('data', 'data2' , 'cartdata'));
    }
}
