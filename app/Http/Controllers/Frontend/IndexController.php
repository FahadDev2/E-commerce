<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Auth;
use Stevebauman\Location\Facades\Location;
class IndexController extends Controller
{

    public function index(){
        return view('frontend.index');
    }

    public function userLogin(){
        return view('frontend.login');
    }

    public function logoutUser() 
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function userProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.customer.profile', compact('userData'));

    }

    public function userProfileStore(Request $request){

        // $validator = Validator::make($request->all(), [

        // ])

        // if ($validator->fails())
        // {
            
        // }

        $ip = $request->hisIp;
     
        $currentUserInfo = \Location::get($ip);
    
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->country = $currentUserInfo->countryName;
        $data->region = $currentUserInfo->regionName;
        $data->city = $currentUserInfo->cityName;
        $data->ip = $currentUserInfo->ip;
        // $data->profile_photo_path = $request->profile_photo_path;

        // if($request->file('profile_photo_path')){
        //     $file = $request->file('profile_photo_path');
        //     //removeOld Photo And replace it with the new one
        //     @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
        //     $fileName = date('Y-m-d').$file->getClientOriginalName();

        //     $file->move(public_path('upload/user_images'), $fileName);
        //     $data['profile_photo_path'] = $fileName;
        // }

        $data->save();

        $notify = array(
            'message' => "User Profile Updated Successfully",
            'alert-type' => 'success'
        );

        session()->flash("success", 'User Profile Updated Successfully');

        return redirect()->route('dashboard')->with($notify);


    }



    public function getUserPassword(){


        return view('frontend.customer.update_password');

        // $id= Auth::user()->id;

        // $updatePass = User::find($id);


    }

    public function updateUserPassword(Request $request){
        
        $validator = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
    
  
        
        $id = Auth::user()->id;
        $hPass = User::find($id)->password;

        if(Hash::check($request->current_password, $hPass)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
           
           
        } 
        $notify = array(
            'message' => "Admin Password Updated Successfully",
            'alert-type' => 'success'
        );
         
        session()->flash("success", 'User Profile Updated Successfully');
        return redirect()->route('dashboard')->with($notify);
    }

}
