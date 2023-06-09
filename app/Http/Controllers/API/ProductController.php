<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data produk berhasil di akses',
            'data' => $products
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_product' => 'required|min:3',
            'deskripsi' => 'required',
            'gambar' => 'image|file|max:4000',
            'harga' => 'integer|required',
            'category_id' => 'required',
            'rating' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi bidang yang kosong',
                'data' => $validator->errors()
            ], 401);
        } else {
            if ($request->file('gambar')) {
                $gambar = $request->file('gambar')->store('product-image');
            } else {
                $gambar = null;
            }
    
            $product = Product::create([
                'nama_product' => $request->input('nama_product'),
                'deskripsi' => $request->input('deskripsi'),
                'gambar' => $gambar,
                'harga' => $request->input('harga'),
                'category_id' => $request->input('category_id'),
                'rating' => $request->input('rating')
            ]);
    
            if ($product) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data produk berhasil disimpan.',
                    'data' => $product
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data produk gagal disimpan.'
                ], 500);
            }
        }
    }    


    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        if ($product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product data retrieved successfully.',
                'data' => [
                    'product' => $product,
                    'categories' => $categories
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ada.'
            ], 500);
        }
    }

        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'nama_product' => 'required|min:3',
                'deskripsi' => 'required',
                'gambar' => 'image|file|max:4000',
                'harga' => 'integer|required',
                'category_id' => 'required',
                'rating' => 'required'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Silahkan isi bidang dengan sesuai',
                    'data' => $validator->errors()
                ], 401);
            } 
            else {
                $product = Product::findOrFail($id);
                if ($request->file('gambar')) {
                    if ($product->gambar) {
                        Storage::delete($product->gambar);
                    }
                    $request->file('gambar')->store('product-image');
                }
                else {
                    $product->gambar;
                }
            
                $product->nama_product = $request->input('nama_product');
                $product->deskripsi = $request->input('deskripsi');
                $product->harga = $request->input('harga');
                $product->category_id = $request->input('category_id');
                $product->rating = $request->input('rating');
            
                if ($product->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Data produk berhasil diubah.',
                        'data' => $product
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Data produk gagal diubah.'
                    ], 500);
                }
            }
        }   
    


    public function destroy($id){
        
        $product = Product::findOrFail($id);
        {
            if ($product->gambar){
                Storage::delete($product->gambar);
            }
            if ($product) $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil dihapus',
                'data' => null
            ]);
        }
    }
}
