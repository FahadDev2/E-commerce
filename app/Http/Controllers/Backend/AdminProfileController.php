<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Auth;

 class AdminProfileController extends Controller
{
    //

    public function AdminProfile(){
        $sessions =  DB::table('sessions')->get();
     
        $adminData = Admin::find(2);
        return view('admin.admin_profile', compact('adminData','sessions'));
    }

    public function AdminProfileStore(Request $request){
        $data = Admin::find(2);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->profile_photo_path = $request->profile_photo_path;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            //removeOld Photo And replace it with the new one
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('Y-m-d').$file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        $notify = array(
            'message' => "Admin Profile Updated Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notify);
    }




    public function AdminUpdatePassword(Request $request){

        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hPass = Admin::find(2)->password;

        if(Hash::check($request->current_password, $hPass)){
            $admin = Admin::find(2);
            $admin->password = Hash::make($request->password);
            $admin->save();
            $notify = array(
                'message' => "Admin Password Updated Successfully",
                'alert-type' => 'success'
            );
            Auth::logout();
            return redirect()->route('admin.logout')->with($notify);
        }else{
            $notify = array(
                'message' => "Chke Pass",
                'alert-type' => 'error'
            );
         
            return redirect()->route('admin.profile')->with($notify);
           
        }
        

    }

}
