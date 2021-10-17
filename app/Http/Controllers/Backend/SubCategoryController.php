<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Validation\Validator;
use Auth;
class  SubCategoryController extends Controller
{
    
    
    public function  SubCategoryIndex(){
        $categories =  Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories =  SubCategory::latest()->get();
        return view('backend.Category.subcategory.index', compact('subcategories', 'categories'));

    }

    public function addNewSubCategory(Request $request){


        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'subcategory_slug_en' => 'required',
            'subcategory_slug_ar' => 'required',
            'subcategory_status' => 'required',
            

        ]);


       
         $subcategorys = new SubCategory;
         $subcategorys->category_id = $request->category_id;

         $subcategorys->subcategory_name_en = $request->subcategory_name_en;
         $subcategorys->subcategory_name_ar = $request->subcategory_name_ar;
         $subcategorys->subcategory_slug_en = $request->subcategory_slug_en;
         $subcategorys->subcategory_slug_ar = $request->subcategory_slug_ar;
         $subcategorys->subcategory_status = $request->subcategory_status;
         $subcategorys->subcategory_image = $request->subcategory_image;
 
         if($request->file('subcategory_image')){
            $file = $request->file('subcategory_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/subcategorys'), $fileName);
            $subcategorys['subcategory_image'] = $fileName;
        }







         $subcategorys->save();

         $notify = array(
            'message' => "subcategory Added Successfully",
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notify);





    }












public function editSubCategory($id){

    $subcategories = SubCategory::findOrFail($id);
    $categories =  Category::orderBy('category_name_en', 'ASC')->get();
    
    return Response()->json(['data' => $subcategories]);
}






public function updateSubCategory(Request $request){

    $id = $request->id;
    $update = SubCategory::findOrFail($id);
     
        $update->subcategory_name_en = $request->subcategory_name_en;
        $update->subcategory_name_ar = $request->subcategory_name_ar;
        $update->subcategory_slug_en = $request->subcategory_slug_en;
        $update->subcategory_slug_ar = $request->subcategory_slug_ar;
        $update->subcategory_status = $request->subcategory_status;
        $update->subcategory_image = $request->subcategory_image;
   
   
        if($request->file('subcategory_image')){
            $file = $request->file('subcategory_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/subcategorys'), $fileName);
            $update['subcategory_image'] = $fileName;
        }

   
   
   
   
   
        $update->save();
 
    $success = true;
    $message = "subcategory Updated successfully";
  
 

 
return Response()->json(['success' => $success,'message' => $message]);
   

    
     
    

}







public function removeSubCategory($id){
    $delete = SubCategory::where('id', $id)->delete();
    
 // check data deleted or not
 if ($delete == 1) {
    $success = true;
    $message = "category deleted successfully";
} else {
    $success = true;
    $message = "category not found";
}

 
return Response()->json(['success' => $success,'message' => $message]);


}



 








}
