<?php

namespace App\Http\Controllers;

use App\Models\SizeDress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeDressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => SizeDress::get()
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
            'size' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $size = SizeDress::create([
            'size' => $request->size
        ]);

        if($size) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $size
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SizeDress  $sizeDress
     * @return \Illuminate\Http\Response
     */
    public function show(SizeDress $sizeDress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SizeDress  $sizeDress
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeDress $sizeDress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SizeDress  $sizeDress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $size = SizeDress::find($id);
        $sizeDress = $size->update([
            'size' => $request->size
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $sizeDress
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SizeDress  $sizeDress
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeDress $sizeDress, $id)
    {
        $size = SizeDress::find($id);
        $size->delete();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil hapus produk'
        ]);
    }
}
