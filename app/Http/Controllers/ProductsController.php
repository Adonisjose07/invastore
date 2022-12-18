<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\ProductCategories;
use Illuminate\Support\Str;
use DataTables;

class ProductsController extends Controller
{
    public function index(){
        return view('admin.products');
    }

    public function getProducts(Request $request){
        if($request->ajax()){
            $data = Product::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Product $row){
                        $actionBtn = '
                            <a href="'.route('products.edit', ['product' => $row->id]).'" class="edit btn btn-success btn-sm">
                                Edit
                            </a> 
                            <a href="'.route('products.delete', ['product' => $row->id]).'" class="delete btn btn-danger btn-sm">
                                Delete
                            </a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }else{
            abort(404);
        }
    }

    public function editProduct( Product $product ){
        $categories = ProductCategories::all();
        return view('admin.products-edit')->with(array('product' => $product, 'categories' => $categories));
    }

    public function updateProduct( Product $product, Request $request ){
        $categories = ProductCategories::all();

        $product->name = $request->input('product-name');
        $product->slug = Str::slug($product->name);
        $product->active = (bool) $request->input('product-active');
        $product->description = $request->input('product-description');
        $product->price = $request->input('product-price');
        $product->category_id = $request->input('product-category');
        $product->save();

        return view('admin.products-edit')->with(array('product' => $product, 'categories' => $categories));
    }

    public function updateProductImages( Product $product, Request $request, $redirectIndex = false){
        $main = $request->file('main');
        $gallery = $request->file('gallery');

        if($gallery){
            foreach($gallery as $photo){
                $filename = $photo->store('public/gallery/'.$product->id);
                $_filename = explode('/', $filename);
                array_shift($_filename);
                $_filename = implode('/', $_filename);


                ProductMedia::create([
                    'product_id' => $product->id,
                    'type' => 'gen',
                    'name' => $_filename,
                    'size' => 'gen',
                    'duration' => 'N/A',
                    'uri' => $_filename,
                    'url' => $_filename,
                    'featured' => 0
                ]);
            }
        }

        if($main){
            $filename = $main->store('public/gallery/'.$product->id);
            $_filename = explode('/', $filename);
            array_shift($_filename);
            $_filename = implode('/', $_filename);

            //check if featured already exists
            $allImages = $product->gallery;
            if(count($allImages)){
                foreach($allImages as $_image){
                    if($_image->featured == 1){
                        if(Storage::exists('public/'.$_image->uri)){
                            Storage::delete('public/'.$_image->uri);
                        }
                        $_image->forceDelete();
                    }
                }
            }

            ProductMedia::create([
                'product_id' => $product->id,
                'type' => 'gen',
                'name' => $_filename,
                'size' => 'gen',
                'duration' => 'N/A',
                'uri' => $_filename,
                'url' => $_filename,
                'featured' => 1
            ]);
        }
        if($redirectIndex){
            return $this->index();
        }
        return redirect()->route('products.edit', ['product' => $product]);
    }

    public function deleteProductImage(Product $product, ProductMedia $image, Request $request) {
        if($request->ajax()){
            if(Storage::exists('public/'.$image->uri)){
                Storage::delete('public/'.$image->uri);
            }
            $image->forceDelete();
    
            return response()->json([
                'success' => true
            ]);
        }else{
            abort(403);
        }
        
    }

    public function newProduct(){
        $categories = ProductCategories::all();
        return view('admin.products-new')->with(array('categories' => $categories));
    }

    public function addProduct(Request $request){
        $product = new Product();
        $product->name = $request->input('product-name');
        $product->slug = Str::slug($product->name);
        $product->active = true;
        $product->description = $request->input('product-description');
        $product->price = $request->input('product-price');
        $product->category_id = $request->input('product-category');
        $product->type = 'PHYSIC';

        $product->save();

        return $this->updateProductImages($product, $request, true);

    }

}
