@extends('frontend.main_master')
@section('content')
@include('frontend.body.breadcrumb')
<div class="body-content">
	<div class="container">
		<div class="sign-in-page" style="width: 50%; margin:auto">
			<div class="row">
		 			
<div class="col-md-12 col-sm-12 sign-in">
	<h4 class="">Forget Password</h4>
	<p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </p>
	 

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
 
	<x-jet-validation-errors class="mb-4" />

	<form  class="register-form outer-top-xs"  method="POST" action="{{route('user.update.password')}}">
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
	  	 
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update password</button>
	</form>				
	
	

	
</div>
 

 
 			</div> 
		</div> 
 </div> 

@endsection