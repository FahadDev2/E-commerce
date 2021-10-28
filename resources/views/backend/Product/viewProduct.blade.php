@extends('admin.admin_master')
@section('admin')
 


 
  
  

 


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
         <div class="col-12">
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
                                       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 166.788px;">Image</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 263.775px;">Name in EN</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 121.425px;">Name in AR</th>
        
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.5125px;">Category</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.5125px;">Price</th>

                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 121.425px;">Quantty</th>
                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 55.5125px;">Status</th>


                                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 103.438px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @if (!empty($products))
                                     @foreach ( $products as $product )
                                         
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <img src="{{asset($product->product_thambnail)}}"  width="50" alt="">
                                        </td>
                                        <td class="sorting_1">{{$product->product_name_en}}</td>
                                        <td class="sorting_1">{{$product->product_name_ar}}</td>
                                        <td>{{$product['category']['category_name_en']}}
                                          In:  <span class="badge badge-success">{{$product['subcategory']['subcategory_name_en']}}</span>

                                        </td>
                                        <td>{{$product->selling_price}}</td>
                                        <td>{{$product->product_qty}}</td>
                                         

                                        <td>
                                        @if ($product->status == 1)
                                        
                                        <span class="badge badge-success">Active</span>

                                        @else
                                        <span class="badge badge-secondary">Inactive</span>

                                    @endif
                                        
                                    </td>
                                        
                                        <td>
                                            <a    id="{{$product->id}}"  data-toggle="modal" data-target="#exampleModal"  class="editall btn btn-sm btn-primary" title="Edit Brand"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirmation({{$product->id}})"   class="removeall btn btn-sm btn-danger" title="Remove Brand"><i class="fas fa-trash"></i></a>
 
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

         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
 
 


@endsection