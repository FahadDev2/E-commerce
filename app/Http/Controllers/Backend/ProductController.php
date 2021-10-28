<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;

use Illuminate\Validation\Validator;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;

class ProductController extends Controller
{
    

    public function getAllProducts(){

    }



    public function addProduct(Request $request){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view('backend.Product.addProduct', compact('categories', 'brands', 'subcategories'));

    }


    public function saveProduct(Request $request){

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/Products/thambanil/'.$name_gen);
        $save_url = 'upload/Products/thambanil/'.$name_gen;
        

       $product_id =  Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_slug_en)),
            'product_slug_ar' => strtolower(str_replace(' ', '-', $request->product_slug_ar)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en'=> $request->product_tags_en,
            'product_tags_ar' => $request->product_tags_ar,
            'product_size_en' => $request->product_size_en,
            'product_size_ar' => $request->product_size_ar,
            'product_color_en' => $request->product_color_en,
            'product_color_ar'=> $request->product_color_ar,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ar' => $request->short_descp_ar,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ar' => $request->long_descp_ar,
            'product_thambnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at'=>  Carbon::now(),
          
        ]);


        ///mulit image upload start 

        $images = $request->file('multi_img');

        
        foreach($images as $img){

            $img_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(80,80)->save('upload/Products/multi-img/'.$img_name);
            $saveIt = 'upload/Products/multi-img/'.$img_name;

            MultiImg::insert([
                'product_id' =>  $product_id,
                'photo_name' => $saveIt,
                'created_at' =>  Carbon::now(),
            ]);

        }

        /*End Multi image start*/

        $notify = array(
            'message' => "Product Added Successfully",
            'alert-type' => 'success'
        ); 
        session()->flash('success', 'Product Added ');

        return redirect()->route('manage.product')->with($notify);


    }


    public function ManageProduct(){

        $products = Product::latest()->get();
        return view('backend.Product.viewProduct', compact('products'));
    }



    public function updateProduct(){

    }


    public function removeProduct(){

    }


}
