<?php

namespace App\Http\Controllers\Products;

use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->get();
        return view('products.create', compact('brands', 'subcategories'));
    }
    public function edit($id)
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->orderBy('name_en')->get();
        $product = DB::table('products')->where('id', '=', $id)->first();
        return view('products.edit', compact('brands', 'subcategories', 'product'));
    }
    public function store(Request $request)
    {
        //validation
        $product = $request->except('_token','image');
        $validated = $request->validate([
            'name_en'=>['required','max:255'],
            'name_ar'=>['required','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quentity'=>['nullable','integer','between:1,999'],
            'status'=>['nullable','in:0,1'],
            'code'=>['required','integer','digits:6','unique:products,code'],
            'details_en'=>['required'],
            'details_ar'=>['required'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'image'=>['required','max:1024','mimes:jpg,jpeg,png']
        ]);
        // upload img
        $photoName = $request->image->hashName();
        $photoPath = public_path('images'. DIRECTORY_SEPARATOR .'products'. DIRECTORY_SEPARATOR . $photoName);
        $request->image->move($photoPath,$photoName);
        $product['image'] = $photoName;
        // insert DB
        DB::table('products')->insert($product);
        // redirect back with success msg
        return redirect()->back()->with('success','Product Has Been Created Successfully');
    }
    public function update(Request $request , $id)
    {
        //validation
        $product = $request->except('_token','image','_method');
        $validated = $request->validate([
            'name_en'=>['required','max:255'],
            'name_ar'=>['required','max:255'],
            'price'=>['required','numeric','between:1,999999.99'],
            'quentity'=>['required','integer','between:1,999'],
            'status'=>['required','in:0,1'],
            'code'=>['required','integer','digits:6','unique:products,code,'.$id.',id'],
            'details_en'=>['required'],
            'details_ar'=>['required'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'image'=>['nullable','max:1024','mimes:jpg,jpeg,png']
        ]);
        // upload img
        $oldImgName = DB::table('products')->select('image')->where('id','=',$id)->first();
        if($request->has('image')){
            $product = DB::table('products')->select('image')->where('id',$id)->first();
            Media::delete('product',$product->image);
            $product['image'] = Media::upload($request->image,'product');
        }

        // insert DB
        DB::table('products')->where('id',$id)->update($product);
        // redirect back with success msg
        return redirect()->back()->with('success','Product has been Updated Successfully');
    }
    public function delete($id)
    {
        $product = DB::table('products')->select('image')->where('id','=',$id)->first();
        Media::delete('product',$product->image);
        DB::table('products')->where('id','=',$id)->delete();
        return redirect()->back()->with('success','Product Deleted Successfully');
    }
}
