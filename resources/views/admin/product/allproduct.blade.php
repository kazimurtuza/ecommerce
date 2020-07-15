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
                  <th class="wd-15p">name</th>
                  <th class="wd-15p">category</th>
                  <th class="wd-15p">brand</th>
                  <th class="wd-15p">code </th>
                  <th class="wd-15p">quantity </th>
                  <th class="wd-15p">Image </th>
                  <th class="wd-20p">price</th>
                  <th class="wd-20p">status</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($product as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->product_name}}</td>
                  <td>{{$row->category_name}}</td>
                  <td>{{$row->brand_name}}</td>
                  <td>{{$row->product_code}}</td>
                  <td>{{$row->product_quantity}}</td>
                  <td><img src="{{url($row->image_one)}} " alt="" height="30px" width="30px"></td>
                  <td>{{$row->selling_price}}</td>
                   <td>
                       @if ($row->status==1)
                       <span class=" badge badge-success">active</span>
                           
                       @else
                        <span class=" badge badge-danger">inactive</span>
                       @endif
                  </td>
                  <td>
                  <a href="{{url('details/product/'.$row->id)}}" id="view" class="btn  btn-info btn-sm"title="details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  <a href="{{url('delete/product/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm" title="delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  <a href="{{url('Edit/product/'.$row->id)}}"  class="btn  btn-primary btn-sm" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  @if ($row->status==1)
                   <a href="{{url('inactive/product/'.$row->id)}}"  class="btn  btn-danger btn-sm" title="inactive"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                  @else
                   <a href="{{url('active/product/'.$row->id)}}"  class="btn  btn-success btn-sm"  title="active"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                  
                      
                  @endif
                 
                 
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