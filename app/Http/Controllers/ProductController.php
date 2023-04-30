<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Product::get()
        ], 200);
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
            'title'   => 'required',
            'slug' => 'required',
            'category' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $image = $request->file("image");

        $imageName = time(). "_". $image->getClientOriginalName();
        $image->move('image', $imageName);

        $category = Category::where('title', $request->category)->first();

        $product = Product::create([
            'category_id' => $category->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => asset('image/' . $imageName),
            'stock' => $request->stock,
            'price' => $request->price
        ]);

        $data = json_decode($request->size);
        foreach($data as $size) {
            Size::create([
                'size' => $size->size,
                'product_id' => $product->id
            ]);
        }


        if($product) {
            return response()->json([
                'status' => 200,
                'message' => 'Data produk berhasil ditambahkan',
                'data' => $product
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Produk gagal disimpan',
            'data' => $product
        ], 409);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => $product
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->file("image")) {
            $validator = Validator::make($request->all(), [
                'title'   => 'required',
                'slug' => 'required',
                'category' => 'required',
                'description' => 'required',
                'stock' => 'required',
                'price' => 'required',
            ]);

            //response error validation
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = json_decode($request->size);
            foreach($data as $size) {
                Size::where('id', $size->id)->delete();
            }

            foreach($data as $size) {
                Size::create([
                    'size' => $size->size,
                    'product_id' => $product->id
                ]);
            }

            $image = $request->file("image");
            $imageName = time(). "_". $image->getClientOriginalName();
            $image->move('image', $imageName);

            $category = Category::where('title', $request->category)->first();
            if($product) {
                $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'image' => asset('image/'. $imageName),
                'stock' => $request->stock,
                'price' => $request->price
                ]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'title'   => 'required',
                'slug' => 'required',
                'category' => 'required',
                'description' => 'required',
                'stock' => 'required',
                'price' => 'required',
            ]);

            //response error validation
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $data = json_decode($request->size);
            foreach($data as $size) {
                Size::where('id', $size->id)->delete();
            }

            foreach($data as $size) {
                Size::create([
                    'size' => $size->size,
                    'product_id' => $product->id
                ]);
            }

            $category = Category::where('title', $request->category)->first();
            if($product) {
                $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'image' => $request->image,
                'stock' => $request->stock,
                'price' => $request->price
                ]);
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil hapus produk'
            ]);
        }
    }

    public function getProductsByCategory (Category $category){
        $products = Product::where('category_id', $category->id)->get();

        if($products) {
            return response()->json([
                'status' => 200,
                'message' => 'berhasil mendapatkan product berdasarkan kategori',
                'data' => $products
            ], 200);
        }


        return response()->json([
            'status' => 404,
            'message' => 'gagal mendapatkan data'
        ], 404);
    }


    public function getProductsBySearch ($search) {
        $products = Product::where('title', 'like', "%$search%")->get();

        if($products) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $products
            ], 200);
        }
    }
}
