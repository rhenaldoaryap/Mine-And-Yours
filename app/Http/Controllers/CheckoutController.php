<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $item = Transaction::with(['details', 'product', 'user'])->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process($id)
    {
        $product = Product::findOrFail($id);

        $transaction = Transaction::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'price' => 20000,
            'transaction_total' => $product->price,
            'transaction_status' => 'IN_CART',

        ]);

        // TransactionDetail::create([
        //     'transactions_id' => $transaction->id,
        //     'username' => Auth::user()->username,
        //     'fullname' => Auth::user()->fullname,
        //     'address' => Auth::user()->address,
        //     'email' => Auth::user()->email,
        //     'transfer_from' => Auth::user()->transfer_from
        // ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove($detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'product'])
            ->findOrFail($item->transactions_id);

        if($item->transfer_from)
        {
            $transaction->transaction_total -= 10000;
        }

        $transaction->transaction_total -=
            $transaction->product->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'fullname' => 'required|string',
            'address' => 'required',
            'email' => 'required',
            'transfer_from' => 'required|string'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['product'])->find($id);

        if($request->transfer_from)
        {
            $transaction->transaction_total += 10000;
        }

        $transaction->transaction_total +=
            $transaction->product->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
