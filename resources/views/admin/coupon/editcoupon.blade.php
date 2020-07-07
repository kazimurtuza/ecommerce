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

              <form action="{{url('update/coupon/'.$coupon->id)}}" method="post">
               @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Edit Coupon_code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="coupon_code" 
                          placeholder="coupon_code" value="{{$coupon->coupon_code}}" >
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Edit Discount</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="discount" 
                          placeholder="coupon_code" value="{{$coupon->discount}}" >
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