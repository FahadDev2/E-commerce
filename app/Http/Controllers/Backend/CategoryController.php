<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use Illuminate\Validation\Validator;
use Auth;
class CategoryController extends Controller
{
    
    
    public function CategoryIndex(){

        $categories = Category::latest()->get();
        return view('backend.Category.index', compact('categories'));

    }

    public function addNewCategory(Request $request){


        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_slug_en' => 'required',
            'category_slug_ar' => 'required',
            'category_status' => 'required',
            'category_image' => 'required',

        ]);


       
         $categorys = new Category;
         $categorys->category_name_en = $request->category_name_en;
         $categorys->category_name_ar = $request->category_name_ar;
         $categorys->category_slug_en = $request->category_slug_en;
         $categorys->category_slug_ar = $request->category_slug_ar;
         $categorys->category_status = $request->category_status;
         $categorys->category_image = $request->category_image;
 
         if($request->file('category_image')){
            $file = $request->file('category_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/categorys'), $fileName);
            $categorys['category_image'] = $fileName;
        }







         $categorys->save();

         $notify = array(
            'message' => "category Added Successfully",
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notify);





    }












public function editCategory($id){

    $category = Category::findOrFail($id);

    return Response()->json(['data' => $category]);
}






public function updateCategory(Request $request){

    $id = $request->id;
    $update = Category::find($id);
     
        $update->category_name_en = $request->category_name_en;
        $update->category_name_ar = $request->category_name_ar;
        $update->category_slug_en = $request->category_slug_en;
        $update->category_slug_ar = $request->category_slug_ar;
        $update->category_status = $request->category_status;
        $update->category_image = $request->category_image;
   
   
        if($request->file('category_image')){
            $file = $request->file('category_image');
            //removeOld Photo And replace it with the new one
            // @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/categorys'), $fileName);
            $update['category_image'] = $fileName;
        }

   
   
   
   
   
        $update->save();
 
    $success = true;
    $message = "category Updated successfully";
  
 

 
return Response()->json(['success' => $success,'message' => $message]);
   

    
     
    

}







public function removeCategory($id){
    $delete = Category::where('id', $id)->delete();
    
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
