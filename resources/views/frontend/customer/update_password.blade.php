@extends('frontend.main_master')
@section('content')
@php
$user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp
 <div class="body-content">
	<div class="container">
		<div class="sign-in-page" style="width: 50%; margin:auto">
			<div class="row">
		 			
<div class="col-md-12 col-sm-12 sign-in">
	<h4 class="">Update Your Password</h4>
     </p>
	 
 
 
 

	<form  class="register-form outer-top-xs"  method="POST" action="{{route('user.profile.password.update')}}">
		@csrf

		<div class="form-group">
		    <label class="info-title" for="current-password">Current Password <span>*</span></label>
		    <input   class="form-control unicase-form-control text-input"  id="current-password" type="password" name="current_password"  required autofocus  >
		</div>

		<div class="form-group">
		    <label class="info-title" for="new-password">New Password <span>*</span></label>
		    <input id="new-password" type="password" name="password" class="form-control unicase-form-control text-input"  required autocomplete="new-password"  >
		</div>

		<div class="form-group">
			<label for="ConfirmPass">Confirm Password :</label>
			<input type="password" class="form-control" id="ConfirmPass" name="password_confirmation" required> </div>
		</div>
	  	 
	  	<input type="submit" class="btn-upper btn btn-primary checkout-page-button" value="Update password">
	</form>				
	
	

	
</div>
 

 
 			</div> 
		</div> 
 </div> 

@endsection