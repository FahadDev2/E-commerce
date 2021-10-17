@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
<script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>
  <script type="module" src="https://js.api.here.com/v3/3.1/mapsjs.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>






 
  
  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <a type="button" class="close" data-dismiss="modal" aria-label="Close"></a>
           </button>
        </div>
        <div class="modal-body">
          

          
            <form  id="idForm" method="POST"  >
                
<input type="hidden" name="id" id="id" >
                     <div class="form-group" style="width:100%">
                        <h5>Brand Name (EN) <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="brand_name_en"  id="brand_name_en" placholder="Brand Name En" class="form-control" required="" data-validation-required-message="This field is required"> 
                           <div class="help-block"></div>
                        </div>
                     </div>
                     <div class="form-group" style="width:100%">
                        <h5>Brand Name (AR) <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="brand_name_ar" id="brand_name_ar" placholder="Brand Name Ar" class="form-control" required="" data-validation-required-message="This field is required"> 
                           <div class="help-block"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                            <div class="form-group" style="width:100%">
                                <h5>Brand Slug (En) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="brand_slug_en" id="brand_slug_en"  placholder="Brand Slug En" class="form-control" required="" data-validation-required-message="This field is required"> 
                                   <div class="help-block"></div>
                                </div>
                             </div>
                         </div>
                         <div class="col-6">
                            <div class="form-group" style="width:100%">
                                <h5>Brand Slug (AR) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="brand_slug_ar" id="brand_slug_ar"   placholder="Brand slug Ar" class="form-control" required="" data-validation-required-message="This field is required"> 
                                   <div class="help-block"></div>
                                </div>
                             </div>
                         </div>

                         <div class="col-6">
                            <div class="form-group">
                                <h5>Brand Status <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_status" id="brand_status"  class="form-control" aria-invalid="false">
                                        <option selected>Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        
                                    </select>
                                <div class="help-block"></div></div>
                            </div>
            
                            
                         </div>

                         <div class="col-6">
                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="brand_image" id="brand_image" class="form-control"  aria-invalid="false"> <div class="help-block"></div></div>
                            </div>
                         </div>



                     </div>

                 
                     <div class="form-group" style="width:100%">
                       
                            <input type="submit" name="submit" id="" value="Update" class="btn btn-primary">
                     </div>

            </form>



        </div>

      </div>
    </div>
  </div>







<div class="container-full">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="d-flex align-items-center">
         <div class="mr-auto">
            <h3 class="page-title">Data Tables</h3>
            <div class="d-inline-block align-items-center">
               <nav>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                     <li class="breadcrumb-item" aria-current="page">Tables</li>
                     <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- Form -->
         <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Data Table With Full Features</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <div class="form-group">
                    <label for="">Map</label>
                    <input type="text" name="" id="searchmap">
                    <div style="width: 640px; height: 480px" id="mapContainer"></div>
                </div>
          
                  <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 166.788px;">Image</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 263.775px;">Name in EN</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 121.425px;">Name in AR</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.5125px;">Status</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 103.438px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @if (!empty($brands))
                                     @foreach ( $brands as $brand )
                                         
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">Image</td>
                                        <td>{{$brand->brand_name_en}}
                                            <small>( Slug: {{$brand->brand_slug_en}} )</small>
                                        </td>
                                        <td>{{$brand->brand_name_ar}}
                                            <small>( Slug: {{$brand->brand_slug_ar}} )</small>
                                        </td>
                                        <td>
                                        @if ($brand->brand_status == 'Active')
                                        
                                        <span class="badge badge-success">Active</span>

                                        @else
                                        <span class="badge badge-secondary">Inactive</span>

                                    @endif
                                        
                                    </td>
                                        
                                        <td>
                                            <a    id="{{$brand->id}}"  data-toggle="modal" data-target="#exampleModal"  class="editall btn btn-sm btn-primary" title="Edit Brand"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirmation({{$brand->id}})"   class="removeall btn btn-sm btn-danger" title="Remove Brand"><i class="fas fa-trash"></i></a>
 
                                        </td>
                                      
                                     </tr>


                                     @endforeach
                                         
                                     @endif

                                
                                 </tbody>
                
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->          
         </div>
         <!-- End Table -->
         <!-- Start Form -->
         <div class="col-md-4 col-12">
            <div class="box">
               <div class="card-header">
                  <h3>Add New Brand</h3>
               </div>
               <div class="box-body">
                   
            
                    <form method="POST" action="{{route('add.brand')}}" >
                        @csrf

                             <div class="form-group" style="width:100%">
                                <h5>Brand Name (EN) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="brand_name_en"  placholder="Brand Name En" class="form-control"  > 
                                   <div class="help-block">
                                       @error('brand_name_en')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                   </div>
                                </div>
                             </div>
                             <div class="form-group" style="width:100%">
                                <h5>Brand Name (AR) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="brand_name_ar"  placholder="Brand Name Ar" class="form-control"  > 
                                   <div class="help-block">
                                    @error('brand_name_ar')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                    <div class="form-group" style="width:100%">
                                        <h5>Brand Slug (En) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <input type="text" name="brand_slug_en"  placholder="Brand Slug En" class="form-control"  > 
                                           <div class="help-block">
                                            @error('brand_slug_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                           </div>
                                        </div>
                                     </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group" style="width:100%">
                                        <h5>Brand Slug (AR) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <input type="text" name="brand_slug_ar"  placholder="Brand slug Ar" class="form-control" > 
                                           <div class="help-block"> @error('brand_slug_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror</div>
                                        </div>
                                     </div>
                                 </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <h5>Brand Status <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="brand_status" id="brand_status"  class="form-control" aria-invalid="false">
                                                <option selected>Select status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                
                                            </select>
                                        <div class="help-block"></div></div>
                                    </div>
                    
                                    
                                 </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"  aria-invalid="false"> <div class="help-block"></div></div>
                                    </div>
                                 </div>



                             </div>
      
                         
                             <div class="form-group" style="width:100%">
                               
                                    <input type="submit" name="submit" id="" value="Save" class="btn btn-primary">
                             </div>

                    </form>


          
                
               </div>
            </div>
         </div>
         <!-- End Form -->
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<script>
    
    var platform = new H.service.Platform({
  'apikey': '0Xep_7VGOpNnYP3dsq71apyC0rukt3Yiy1C3Hahwf4c'
});

var defaultLayers = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
    document.getElementById('mapContainer'),
    defaultLayers.vector.normal.map,
    {
      zoom: 10,
      center: { lat: 27.85, lng: 85.36 }
    });

   
    markers = [];

for (var i = 0; i < points.length; i++) {
    markers.push(new H.map.Marker(points[i], {
        // A new identical Icon instance is created at each iteration 
        // of the loop - do not do this:
        icon: new H.map.Icon('graphics/markerHouse.png')
      }));
}

</script>
<script>
 
 $(".editall").click(function(){
     
 
    var id = this.id;
    
       $.ajax({
             url: "{{url('/admin/brand/edit')}}/" + id,

     
             success: function(data){
                $('#id').val(data.data.id);
                $('#brand_name_en').val(data.data.brand_name_en);
                $('#brand_name_ar').val(data.data.brand_name_ar);
                $('#brand_slug_en').val( data.data.brand_slug_en);
                $('#brand_slug_ar').val( data.data.brand_slug_ar);
                $('#brand_status option').val( data.data.brand_status);
          }
        });
 });



 function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function (e) {
            
            if (e === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/brand/remove')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                          setTimeout(() => {
                            location.reload();
                          }, 1500);

                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }



    $("#idForm").submit(function(e) {

e.preventDefault(); 

        swal({
            title: "Ok?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Update it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then(function (e) {
            
            if (e === true) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    let id =  $('#id').val();
    let enName =  $('#brand_name_en').val();
    let arName =  $('#brand_name_ar').val();
    let enSlug =  $('#brand_slug_en').val();
    let arSlug =  $('#brand_slug_ar').val();
    let status = $('#brand_status option:selected').text();
    let image = $('#brand_image').val();
 console.log(status);
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/brand/update')}}",
                    data: {
                        id:id,
                        brand_name_en:enName,
                        brand_name_ar:arName,
                        brand_slug_en:enSlug,
                        brand_slug_ar:arSlug,
                        brand_status:status,
                        brand_image:image,
                        _token: _token,
                    },
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                          setTimeout(() => {
                            location.reload();
                          }, 1500);

                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    });


 
</script>


@endsection