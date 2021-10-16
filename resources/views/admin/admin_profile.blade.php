@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Profile</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<style>
    .image-upload > input {
  visibility:hidden;
  width:0;
  height:0
}
</style>

    <div class="container">
        <div class="row">

        
            <div class="box box-inverse bg-img"   data-overlay="2"  style="padding: 25px">
      


                <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                    @csrf

                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                    <h4>Edit General Info</h4>
                    <div class="box-body text-center pb-50">
                        <div class="image-upload">
                            <small>Click on photo to change</small>
                            <br>
                            <label for="file-input">
                              <img id="showMe" class="avatar avatar-xxl avatar-bordered" src="{{
                        
                                (!empty($adminData->profile_photo_path) ? url('upload/admin_images/'. $adminData->profile_photo_path) : asset('backend/images/avatar/avatar-1.png')
                                )}}" style="pointer-events: none" width="100" height="100"/>
                            </label>
                          
                            <input id="file-input" type="file"  name="profile_photo_path" onchange="previewFile()"  />
                          </div>
                          

                      
                            
                       
           
                      <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Welcome Mr. {{$adminData->name}}</a></h4>
                      <small>Last active 1 hour ago</small>
                     </div>
     
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="AdminName">Admin Name :</label>
                                <input type="text" class="form-control" id="AdminName" name="name" value="{{$adminData->name}}"> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="AdminEmail">Admin Email :</label>
                                <input type="text" class="form-control" id="AdminEmail"  name="email" value="{{$adminData->email}}"> </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="AdminPhone">Admin Phone :</label>
                                <input type="text" name="phone" class="form-control" id="AdminPhone" value="{{$adminData->phone}}"> </div>
                        </div>
                    </div>
                
     
                    <button type="submit" class="btn btn-rounded btn-info mb-5" style="margin: auto">
                        Update
                    </button>
    
                </form>
                </section>
           
               

        </div>



        <div class="box box-inverse bg-img"   data-overlay="2">
      

            <div class="box-body pb-50">
                <form method="POST" action="{{route('admin.update.password')}}"  >
                    @csrf

                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
                    <h3>Update Password</h3>
    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="CurrentPass">Current Password :</label>
                                <input type="password" class="form-control" id="CurrentPass" name="current_password" value=""> </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NewPass">New Password :</label>
                                <input type="password" class="form-control" id="NewPass" name="password"> </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ConfirmPass">Confirm Password :</label>
                                <input type="password" class="form-control" id="ConfirmPass" name="password_confirmation"> </div>
                        </div>
                    </div>
                    
    
                    <button type="submit" class="btn btn-rounded btn-info mb-5">
                        Update
                    </button>
                </form>
                </section>
            </div>

       
           

        
    </div>


 

    <div class="box box-inverse bg-img"   data-overlay="2">
        <div class="box-body pb-50">
           <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false">
              <h4>   Browser Sessions </h4>
              @if (count($sessions) > 0)
              <br>
              @foreach ($sessions as $session)
              <div class="row">

                 <div class="col-md-1">
                    <div>
                   
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
    
                        
                    </div>
                 </div>
                 <div class="col-md-11">
                    <div class="ml-3">
                       <div class="text-sm text-gray-600">
                        {{ $session->user_agent  }} - {{ $session->user_agent  }}
                       </div>
                       <div>
                          <div class="text-xs text-gray-500">
                            {{ $session->ip_address }},

                                
                                        {{ __('Last active') }} {{ $session->last_activity  }}
                                    
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              @endforeach
         
        @endif

               

             <div class="flex items-center mt-5">
                <button type="submit" class="btn btn-rounded btn-info mb-5 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:click="confirmLogout" wire:loading.attr="disabled">
        Log Out Other Browser Sessions
    </button>
  
    
                <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('SjOsHeD9Iw6TdDXKuaTh').on('loggedOut', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms="" style="display: none;" class="text-sm text-gray-600 ml-3">
        Done.
    </div>
            </div>
           </section>
        </div>
     </div>
     
    </div>


  </div>
 
<script type="text/javascript">

 

function previewFile() {
  const preview = document.querySelector('#showMe');
  const file = document.querySelector('#file-input').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

</script>


  @endsection














