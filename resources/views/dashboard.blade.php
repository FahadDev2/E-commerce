@extends('frontend.main_master')
@section('content')
<br>
<div class="body-content">
    <div class="container">
    
  
        <div class="row">



            <div class="col-md-2">

                <img class="card-img-top" style="border-radius: 50%" src="{{
                        
					(!empty($adminData->profile_photo_path) ? url('upload/admin_images/'. $adminData->profile_photo_path) : asset('backend/images/avatar/avatar-1.png')
					)}}" height="100%" width="100%" />

                    <ul class="list-group list-group-flush">
                         <a href="#" class="btn btn-primary btn-sm btn-block">Home</a> 
                         <a href="#" class="btn btn-primary btn-sm btn-block">Profile Update</a> 
                         <a href="#" class="btn btn-primary btn-sm btn-block">Change Password</a> 
                         <a href="{{route('user.logout')}}" class="btn btn-primary btn-sm btn-block">Logout</a> 
                    </ul>

            </div>


            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-left"><span class="text-danger">Hi..</span><strong>{{Auth::user()->name}}</strong></h3>
                </div>
            </div>





        </div>
        


        
        
    </div>
    <!-- /.container --> 
  </div>
<br>
  @endsection