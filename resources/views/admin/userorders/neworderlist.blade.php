 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
    
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>New Orders</h5>
       
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         
       
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">Payment type</th>
                  <th class="wd-15p">TRANSECTION ID</th>
                  <th class="wd-20p">SUBTOTAL</th>
                  <th class="wd-20p">SHIPPING</th>
                  <th class="wd-20p">TOTAL</th>
                  <th class="wd-20p">DATE</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">ACTION</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($neworder as $row)
                <tr>
                  <td>{{$row->pay_type}}</td>
                  <td>{{$row->bln_transection}}</td>
                  <td>{{$row->subtotal}} Tk</td>
                  <td>{{$row->shipping}} Tk</td>
                  <td>{{$row->total}} $</td>
                  <td>{{$row->date}} </td>
               @if ($row->statuse==0)
                <td><h4 class=" badge badge-danger">panding</h4> </td>
                @elseif($row->statuse==1)
                  <td><h4 class=" badge badge-info">payment accepted</h4> </td>
                @elseif($row->statuse==2)
                  <td><h4 class=" badge badge-info">Delevery Progress</h4> </td>
                @elseif($row->statuse==3)
                  <td><h4 class=" badge badge-info">Delevery done</h4> </td>
                @elseif($row->statuse==4)
                  <td><h4 class=" badge badge-info"> invalied order</h4> </td>
                   @else
               @endif
                 
                  <td>
                 
                  <a href="{{url('neworders/details/'.$row->id)}}"  class="btn btn-info">Details</a>    
                      

                 
                 
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

              <form action="{{route('store.category')}}" method="post">
               @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"                         aria-describedby="emailHelp" name="category_name" placeholder="category name" >
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