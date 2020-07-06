 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Data Table</h5>
          <p>DataTables is a plug-in for the jQuery Javascript library.</p>
        </div><!-- sl-page-title -->



                
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

              <form action="{{url('update/brand/'.$brand->id)}}" method="post" enctype="multipart/form-data">
               @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Edit Brand_Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="brand_name" 
                          placeholder="category name" value="{{$brand->brand_name}}" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Edit Brand_Logo</label>
                            <input type="file" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="brand_logo" 
                          placeholder="category name" value="{{$brand->brand_logo}}" >
                          </div>
                          <div class="form-group">
                          <img src="{{url($brand->brand_logo)}}" height="70px" alt="">
                          </div>

                        
                        
                      
                   
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-info pd-x-20">update</button>
                                      
                                      </div>
           </form>     

            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->


        {{--End modal----------------------- --}}
      

       

      
   

        </div><!-- sl-pagebody -->

    
@endsection