 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Data Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon DataTable
            <a href="#" style=" float: right;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
       
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Coupon_Code</th>
                  <th class="wd-15p">discount (%)</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($coupon as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->coupon_code}}</td>
                  <td>{{$row->discount}}%</td>
                  <td>
                  <a href="{{url('showedit/coupon/'.$row->id)}}" class="btn btn-success btn-sm">Edit</a>
                  <a href="{{url('delete/coupon/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm">Delete</a>   
                 
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

              <form action="{{route('store.coupon')}}" method="post">
               @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">coupon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="coupon_code" placeholder="coupon code" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">discount(%)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="discount" placeholder="discount" >
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
      

       

      
   

        </div><!-- sl-pagebody -->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
          <div>Made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
@endsection