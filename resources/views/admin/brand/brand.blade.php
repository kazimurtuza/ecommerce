 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
   

      <div class="sl-pagebody">
        <div class="sl-page-title">
         
          {{-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> --}}
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand
            <a href="#" style=" float: right;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
       
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand name</th>
                  <th class="wd-15p">Brand Logo</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($brand as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->brand_name}}</td>
                <td>  <img src="{{url($row->brand_logo)}}" alt="" height="70px" ></td>
                 
                  <td>
                  <a href="{{url('showedit/brand/'.$row->id)}}" class="btn btn-success btn-sm">Edit</a>
                  <a href="{{url('delete/brand/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm">Delete</a>    
                 
                  </td>
                  
                </tr>
                       @endforeach
             
          
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        <p class="tx-11 tx-uppercase tx-spacing-2 mg-t-40 mg-b-10 tx-gray-600">Javascript Code</p>



        {{-- modal----------------------- --}}

     <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">
                
               {{-- validation error --}}
                    @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif

               {{-- End validation error --}}

              <form action="{{route('store.brand')}}" method="post"  enctype="multipart/form-data">  
               @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Brand name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="brand_name" placeholder="Brand name" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Brand Logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="brand_logo"  placeholder="Brand logo" >
                          </div>
                        
                      
                   
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                        <button type="button" class="btn btn-secondary pd-x-20"                         data-dismiss="modal">Close</button>
                                      </div>
           </form>     

            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


        {{--End modal----------------------- --}}
      

       

      
   

        </div>
    
@endsection