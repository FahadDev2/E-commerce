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
                    <h3 class="text-left"><span class="text-danger">Hi..</span><strong>{{Auth::user()->name}}</strong> Updated Your Profile</h3>
    
    
                    <div class="card-body">
                        <form method="POST" action="{{route('user.profile.store')}}" >
                            @csrf
                        <div class="row">
                            <input type="hidden" value="" id="getHisIp" name="hisIp">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{ $userData->name }}" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{ $userData->email }}" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                                    <input type="number" name="phone" class="form-control unicase-form-control text-input" value="{{ $userData->phone }}" >
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Country <span>*</span></label>
                                    <input type="text" name="country" class="form-control unicase-form-control text-input" value="{{ $userData->country }}"  disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Region <span>*</span></label>
                                    <input type="text" name="region" class="form-control unicase-form-control text-input" value="{{ $userData->region }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">City <span>*</span></label>
                                    <input type="text" name="city" class="form-control unicase-form-control text-input" value="{{ $userData->city }}" disabled>
                                </div>
                            </div> --}}

                            <input type="submit" name="submit" id="" value="update" class="btn btn-success"> 

                        </div>
                    </form>
                    

                          

                           

                           

                            
                           

                


                    </div>
    
                </div>
            </div>





        </div>
        


        
        
    </div>
    <!-- /.container --> 
  </div>
<br>

<script>
	function getIP(json) {
 	  document.getElementById('getHisIp').setAttribute('value', json.ip);
	}
	</script>
	<script src="https://api.ipify.org?format=jsonp&callback=getIP"></script>
	
 
	<script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"> </script>
  @endsection