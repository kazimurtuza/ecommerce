 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
   

      <div class="sl-pagebody">
        <div class="sl-page-title">
         
          {{-- <p>DataTables is a plug-in for the jQuery Javascript library.</p> --}}
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">database backup list
            <a href="{{route('backupNow')}}" style=" float: right;" class=" btn btn-warning">backup New</a>
         
          </h6>
       
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
             
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Size</th>
                  <th class="wd-20p">Path</th>
                  <th class="wd-20p">action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($files as $row)
                <tr>
                  <td>{{$row->getFilename()}}</td>
                  <td>{{$row->getsize()}}</td>
                  <td>{{$row->getpath()}}</td>
               
                 
                  <td>
                  <a href="{{url('database/download/'.$row->getFilename())}}" class="btn btn-success btn-sm">Download</a>
                  <a href="{{url('database/delete/'.$row->getFilename())}}" id="delete" class="btn  btn-danger btn-sm">Delete</a>    
                 
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
              
          </div><!-- modal-dialog -->
        </div><!-- modal -->


        {{--End modal----------------------- --}}
      

       

      
   

        </div>
    
@endsection