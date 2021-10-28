@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
 
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
<div class="form-group"> 
    @php($i =0)
    
    <h5>Category Linked <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="select" id="select" required="" class="form-control" aria-invalid="false">
           
          
        
            @foreach ( $subcategories as $sub)
          
             <option value="{{$sub['category']['id']}}" {{ $sub['category']['id'] == $sub->category_id ? 'selected' : ''}}>{{$sub['category']['category_name_en']}}</option>
            
             @endforeach
            
         </select>
    <div class="help-block"></div></div>
</div>
                     <div class="form-group" style="width:100%">
                        <h5>subcategory Name (EN) <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="subcategory_name_en"  id="subcategory_name_en" placholder="subcategory Name En" class="form-control" required="" data-validation-required-message="This field is required"> 
                           <div class="help-block"></div>
                        </div>
                     </div>

                     <div class="form-group" style="width:100%">
                        <h5>subcategory Name (AR) <span class="text-danger">*</span></h5>
                        <div class="controls">
                           <input type="text" name="subcategory_name_ar" id="subcategory_name_ar" placholder="subcategory Name Ar" class="form-control" required="" data-validation-required-message="This field is required"> 
                           <div class="help-block"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-6">
                            <div class="form-group" style="width:100%">
                                <h5>subcategory Slug (En) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="subcategory_slug_en" id="subcategory_slug_en"  placholder="subcategory Slug En" class="form-control" required="" data-validation-required-message="This field is required"> 
                                   <div class="help-block"></div>
                                </div>
                             </div>
                         </div>
                         <div class="col-6">
                            <div class="form-group" style="width:100%">
                                <h5>subcategory Slug (AR) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="subcategory_slug_ar" id="subcategory_slug_ar"   placholder="subcategory slug Ar" class="form-control" required="" data-validation-required-message="This field is required"> 
                                   <div class="help-block"></div>
                                </div>
                             </div>
                         </div>

                         <div class="col-6">
                            <div class="form-group">
                                <h5>subcategory Status <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_status" id="subcategory_status"  class="form-control" aria-invalid="false">
                                        <option selected>Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        
                                    </select>
                                <div class="help-block"></div></div>
                            </div>
            
                            
                         </div>

                         <div class="col-6">
                            <div class="form-group">
                                <h5>subcategory Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="subcategory_image" id="subcategory_image" class="form-control"  aria-invalid="false"> <div class="help-block"></div></div>
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
                  <div class="table-responsive">
                     <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 166.788px;">Category</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 263.775px;">Sub category EN</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 121.425px;">Sub category in AR</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.5125px;">Status</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 103.438px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @if (!empty($subcategories))
                                     @foreach ( $subcategories as $subcategory )
                                         
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">{{$subcategory->category_id}} : {{$subcategory['category']['category_name_en']}}</td>
                                        <td>{{$subcategory->subcategory_name_en}}
                                            <small>( Slug: {{$subcategory->subcategory_slug_en}} )</small>
                                        </td>
                                        <td>{{$subcategory->subcategory_name_ar}}
                                            <small>( Slug: {{$subcategory->subcategory_slug_ar}} )</small>
                                        </td>
                                        <td>
                                        @if ($subcategory->subcategory_status == 'Active')
                                        
                                        <span class="badge badge-success">Active</span>

                                        @else
                                        <span class="badge badge-secondary">Inactive</span>

                                    @endif
                                        
                                    </td>
                                        
                                        <td>
                                            <a    id="{{$subcategory->id}}"  data-toggle="modal" data-target="#exampleModal"  class="editall btn btn-sm btn-primary" title="Edit subcategory"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirmation({{$subcategory->id}})"   class="removeall btn btn-sm btn-danger" title="Remove subcategory"><i class="fas fa-trash"></i></a>
 
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
                  <h3>Add New subcategory</h3>
               </div>
               <div class="box-body">
                   
             
                    <form method="POST" action="{{route('add.sub.category')}}" >
                        @csrf
                        <div class="form-group">
                            <h5>Category Linked <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id" id="category_id" required="" class="form-control" aria-invalid="false">
                                    @foreach ( $categories as  $category)

                                    <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                        
                                    @endforeach
                                 </select>
                            <div class="help-block"></div></div>
                        </div>

                             <div class="form-group" style="width:100%">
                                <h5>subcategory Name (EN) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="subcategory_name_en"  placholder="subcategory Name En" class="form-control"  > 
                                   <div class="help-block">
                                       @error('subcategory_name_en')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                   </div>
                                </div>
                             </div>

       


                    
                             <div class="form-group" style="width:100%">
                                <h5>subcategory Name (AR) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="text" name="subcategory_name_ar"  placholder="subcategory Name Ar" class="form-control"  > 
                                   <div class="help-block">
                                    @error('subcategory_name_ar')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                   </div>
                                </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                    <div class="form-group" style="width:100%">
                                        <h5>subcategory Slug (En) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <input type="text" name="subcategory_slug_en"  placholder="subcategory Slug En" class="form-control"  > 
                                           <div class="help-block">
                                            @error('subcategory_slug_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                           </div>
                                        </div>
                                     </div>
                                 </div>
                                 <div class="col-6">
                                    <div class="form-group" style="width:100%">
                                        <h5>subcategory Slug (AR) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                           <input type="text" name="subcategory_slug_ar"  placholder="subcategory slug Ar" class="form-control" > 
                                           <div class="help-block"> @error('subcategory_slug_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror</div>
                                        </div>
                                     </div>
                                 </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <h5>subcategory Status <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_status" id="subcategory_status"  class="form-control" aria-invalid="false">
                                                <option selected>Select status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                
                                            </select>
                                        <div class="help-block"></div></div>
                                    </div>
                    
                                    
                                 </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <h5>subcategory Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="subcategory_image" class="form-control"  aria-invalid="false"> <div class="help-block"></div></div>
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
 
 $(".editall").click(function(){
     
 
    var id = this.id;
    
       $.ajax({
             url: "{{url('/admin/category/sub/edit')}}/" + id,

     
             success: function(data){
                 console.log(data);
                $('#id').val(data.data.id);
                $('#subcategory_name_en').val(data.data.subcategory_name_en);
                $('#subcategory_name_ar').val(data.data.subcategory_name_ar);
                $('#subcategory_slug_en').val( data.data.subcategory_slug_en);
                $('#subcategory_slug_ar').val( data.data.subcategory_slug_ar);
                $('#subcategory_status option').val( data.data.subcategory_status);
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
                    url: "{{url('/admin/category/sub/remove')}}/" + id,
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
    let enName =  $('#subcategory_name_en').val();
    let arName =  $('#subcategory_name_ar').val();
    let enSlug =  $('#subcategory_slug_en').val();
    let arSlug =  $('#subcategory_slug_ar').val();
    let status = $('#subcategory_status option:selected').text();
    let image = $('#subcategory_image').val();
 console.log(status);
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/category/sub/update')}}",
                    data: {
                        id:id,
                        subcategory_name_en:enName,
                        subcategory_name_ar:arName,
                        subcategory_slug_en:enSlug,
                        subcategory_slug_ar:arSlug,
                        subcategory_status:status,
                        subcategory_image:image,
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