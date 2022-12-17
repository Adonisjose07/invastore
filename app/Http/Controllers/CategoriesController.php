<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductCategories;
use DataTables;

class CategoriesController extends Controller
{
    public function index(){
        return view('admin.categories');
    }

    public function getCategories(Request $request){
        if($request->ajax()){
            $data = ProductCategories::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(ProductCategories $row){
                        $actionBtn = '
                            <a href="'.route('categories.edit', ['id' => $row->id]).'" class="edit btn btn-success btn-sm">
                                Edit
                            </a> 
                            <a href="'.route('categories.delete', ['category' => $row->id]).'" class="delete btn btn-danger btn-sm">
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

    public function editCategory( ProductCategories $id ){
        return view('admin.categories-edit')->with(array('category' => $id));
    }

    public function updateCategory( ProductCategories $id, Request $request ){
        $id->name = $request->input('category-name');
        $id->slug = Str::slug($id->name, '-');
        $id->description = $request->input('category-description');
        
        $banner = $request->file('main');
        if($banner){
            if($id->banner != null){
                if(Storage::exists('public/'.$id->banner)){
                    Storage::delete('public/'.$id->banner);
                }
            }
            $filename = $banner->store('public/banners');
            $_filename = explode('/', $filename);
            array_shift($_filename);
            $_filename = implode('/', $_filename);
            $id->banner = $_filename;
        }

        $id->save();

        return view('admin.categories-edit')->with(array('category' => $id));
    }

    public function newCategory(){
        return view('admin.categories-new');
    }

    public function addCategory(Request $request){
        $category = new ProductCategories();
        $category->name = $request->input('category-name');
        $category->slug = Str::slug($category->name, '-');
        $category->description = $request->input('category-description');
        
        $banner = $request->file('main');
        if($banner){
            $filename = $banner->store('public/banners');
            $_filename = explode('/', $filename);
            array_shift($_filename);
            $_filename = implode('/', $_filename);
            $category->banner = $_filename;
        }
        $category->save();

        return $this->index();
    }

    public function deleteCategory(ProductCategories $category){
        if(Storage::exists('public/'.$category->banner)){
            Storage::delete('public/'.$category->banner);
        }
        $category->forceDelete();
        return $this->index();
    }
}
