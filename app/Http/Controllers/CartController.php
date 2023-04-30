<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart = Cart::get();
        if(request('productId') && request('userId')) {
            $cart = Cart::where([
                ['product_id', '=', request('productId')],
                ['user_id', '=', request('userId')],
                ['size', '=', request('size')]
            ])->first();
        }

        return response()->json([
            'status' => 200,
            'data' => $cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'user_id' => 'required',
            'total_price' => 'required',
            'quantity' => 'required',
            'size' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ], 400);
        }

        $cart = Cart::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
            'quantity' => $request->quantity,
            'size' => $request->size
        ]);

        if($cart) {
            return response()->json([
                'status' => 200,
                'message' => 'Product berhasil di tambahkan ke keranjang',
                'data' => $cart
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil dapatkan data keranjang',
            'data' => $cart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'user_id' => 'required',
            'total_price' => 'required',
            'quantity' => 'required',
            'size' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }

        $cart->update([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
            'quantity' => $request->quantity,
            'size' => $request->size
        ]);

            return response()->json([
                'status' => 200,
                'message' => 'Product berhasil diupdate ke keranjang',
                'data' => $cart
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $delete = $cart->delete();

        if($delete) {
            return response()->json([
                'message' => 'Berhasil hapus keranjang',
                'data' => $delete
            ]);
        }

        return response()->json([
            'message' => 'Gagal hapus keranjang',
            'data' => $delete
        ]);

    }

    public function getCartsByUser (User $user) {
        $carts = Cart::where('user_id', $user->id)->with('product')->get();

        if($carts) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil',
                'data' => $carts
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Tidak ada product di keranjang',
            'data' => []
        ]);
    }
}
