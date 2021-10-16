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

<form  class="register-form outer-top-xs"  method="POST" action="{{ route('password.email') }}">
    @csrf

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	 
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset</button>
	</form>					
</div>
 

 
 			</div> 
		</div> 
 </div> 

@endsection