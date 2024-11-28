<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|integer',
                'description' => 'required',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $imagePath = null;
            if ($request->file('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
            }

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath
            ]);

            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $product = Product::findOrFail($id);
            // dd($product);

            File::delete($product->image);
            $product->delete();

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch(\Exception $e){
            dd($e->getMessage());
        }
    }

}
