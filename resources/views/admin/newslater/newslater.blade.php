 @extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Newslater Data Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">DataTable
            <a href="#" style=" float: right;" class="btn btn-danger btn-sm" >delete all</a>
          </h6>
       
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">email</th>
                  <th class="wd-15p">subscribe time</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($newslater as $row)
                <tr>
                  <td> <input type="checkbox" name="delete" id=""> {{$row->id}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{Carbon\Carbon::parse($row->created_at)->diffForhumans()}}</td>
                  <td>
                  <a href="{{url('delete/newslater/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm">Delete</a>
                 
                  </td>
                  
                </tr>
                       @endforeach
             
          
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        <p class="tx-11 tx-uppercase tx-spacing-2 mg-t-40 mg-b-10 tx-gray-600">Javascript Code</p>



      
      
   

        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
@endsection