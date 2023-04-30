<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::get();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => $order
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



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = Status::where('name', $request->status)->first();

        $order = Order::find($id);
        $order->update([
            'status_id' => $status->id
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'success'
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function getOrderByUser (User $user) {
        // $order = DetailOrder::whereHas('order', function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // })->get();

        $order = Order::where('user_id', $user->id)->get();


        return response()->json([
            'data' => $order
        ]);

    }


    public function getOrdersBySearch ($search) {

        $orders = Order::where('no_order', 'like', "%$search%")->get();

        if($orders) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $orders
            ], 200);
        }

    }
}
