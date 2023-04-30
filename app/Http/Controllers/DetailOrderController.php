<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'user_id' => 'required',
            'cart_id' => 'required',
            'nohp' => 'required',
            'city' => 'required',
            'province' => 'required',
            'address' => 'required',
            'total' => 'required',
            'ongkir' => 'required',
            'payment' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => $validator->errors()
            ]);
        }

        $order = Order::create([
            'user_id' => $request->user_id,
            'status_id' => 1,
            'no_order' => $request->no_order,
            'total_pay' => $request->total_pay,
            'ongkir' => $request->ongkir,
            'nohp' => $request->nohp,
            'city' => $request->city,
            'province' => $request->province,
            'address' => $request->address,
            'payment' => $request->payment,
        ]);

        foreach($request->cart_id as $cart) {
            $DetailOrder = DetailOrder::create([
                'order_id' => $order->id,
                'user_id' => $request->user_id,
                'product_id' => $cart["product_id"],
                'status_id' => 1,
                'total_price' => $cart['total_price'],
                'quantity' => $cart['quantity'],
                'total' => $request->total,
                'ongkir' => $request->ongkir,
                'size' => $cart['size']
            ]);
        }


        if($DetailOrder) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $DetailOrder
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailOrder $detailOrder)
    {
        //
    }
}
