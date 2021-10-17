<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Brand;
use Illuminate\Validation\Validator;
use Auth;
class BrandController extends Controller
{
    
    
    public function BrandIndex(){

        $brands = Brand::latest()->get();
        return view('backend.Brand.index', compact('brands'));

    }

    public function addNewBrand(Request $request){


        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_slug_en' => 'required',
            'brand_slug_ar' => 'required',
            'brand_status' => 'required',
            'brand_image' => 'required',

        ]);


       
         $brands = new Brand;
         $brands->brand_name_en = $request->brand_name_en;
         $brands->brand_name_ar = $request->brand_name_ar;
         $brands->brand_slug_en = $request->brand_slug_en;
         $brands->brand_slug_ar = $request->brand_slug_ar;
         $brands->brand_status = $request->brand_status;
         $brands->brand_image = $request->brand_image;
 
         if($request->file('brand_image')){
            $file = $request->file('brand_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/Brands'), $fileName);
            $brands['brand_image'] = $fileName;
        }







         $brands->save();

         $notify = array(
            'message' => "Brand Added Successfully",
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notify);





    }












public function editBrand($id){

    $brand = Brand::find($id);

    return Response()->json(['data' => $brand]);
}






public function updateBrand(Request $request){

    $id = $request->id;
    $update = Brand::find($id);
     
        $update->brand_name_en = $request->brand_name_en;
        $update->brand_name_ar = $request->brand_name_ar;
        $update->brand_slug_en = $request->brand_slug_en;
        $update->brand_slug_ar = $request->brand_slug_ar;
        $update->brand_status = $request->brand_status;
        $update->brand_image = $request->brand_image;
   
   
        if($request->file('brand_image')){
            $file = $request->file('brand_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/Brands'), $fileName);
            $update['brand_image'] = $fileName;
        }

   
   
   
   
   
        $update->save();
 
    $success = true;
    $message = "Brand Updated successfully";
  
 

 
return Response()->json(['success' => $success,'message' => $message]);
   

    
     
    

}







public function removeBrand($id){
    $delete = Brand::where('id', $id)->delete();
    
 // check data deleted or not
 if ($delete == 1) {
    $success = true;
    $message = "Brand deleted successfully";
} else {
    $success = true;
    $message = "Brand not found";
}

 
return Response()->json(['success' => $success,'message' => $message]);


}



 








}
