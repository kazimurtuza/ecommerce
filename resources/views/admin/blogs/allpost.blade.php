@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Newslater Data Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
   

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">post category</th>
                  <th class="wd-15p">post title</th>
                  <th class="wd-15p">post image </th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>

                   @foreach ($allpost as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->category_name_en}}</td>
                  <td>{{$row->post_title_en}}</td>
                  {{-- <td>{{$row->post_title_en}}</td> --}}
                  {{-- <td>{{$row->details_en}}</td> --}}
                  @if ($row->post_image)
                      <td><img src="{{url($row->post_image)}} " alt="" height="30px" width="30px"></td> 
                      @else
                      <td>no image</td> 
                  @endif
                 
        
                   {{-- <td>
                       @if ($row->status==1)
                       <span class=" badge badge-success">active</span>
                           
                       @else
                        <span class=" badge badge-danger">inactive</span>
                       @endif
                  </td> --}} 
                  <td>
                  {{-- <a href="{{url('details/product/'.$row->id)}}" id="view" class="btn  btn-info btn-sm"title="details"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                  <a href="{{url('delete/post/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm" title="delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  <a href="{{url('Edit/post/'.$row->id)}}"  class="btn  btn-primary btn-sm" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
           
                 
                 
                  </td>
                  
                </tr>
                       @endforeach
             
          
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    
@endsection