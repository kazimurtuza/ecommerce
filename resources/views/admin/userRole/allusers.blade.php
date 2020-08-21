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
             
                  <th class="wd-15p">name</th>
                  <th class="wd-15p">phone</th>
                  <th class="wd-20p">status</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                   @foreach ($user as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
             
                  <td>
                      @if ($row->category==1)
                      
                           <span class=" badge badge-danger">category</span>

                           @endif
                        @if($row->coupon==1)
                         <span class=" badge badge-danger">coupon</span>
                         @else 
                         @endif
                        @if($row->order==1)
                         <span class=" badge badge-info">order</span>
                         @else 
                         @endif
                        @if($row->product==1)
                         <span class=" badge badge-primary">product</span>
                         @else 
                         @endif
                          @if($row->other==1)
                         <span class=" badge badge-success">other</span>
                         @else 
                         @endif
                        @if($row->blog==1)
                         <span class=" badge badge-dark">blog</span>
                         @else 
                           @endif
                        @if($row->user_role==1)
                         <span class=" badge badge-dark">user_role</span>
                         @else 
                         @endif
                        @if($row->report==1)
                         <span class=" badge badge-secondary">report</span>
                         @else 
                         @endif
                     
                        @if($row->return_order==1)
                         <span class=" badge badge-info">return_order</span>
                         @else 
                         @endif
                        @if($row->contact==1)
                         <span class=" badge badge-primary">contact</span>
                         @else 
                         @endif
                        @if($row->product_comment==1)
                         <span class=" badge badge-danger">product_comment</span>
                         @else 
                         @endif
                        @if($row->setting==1)
                         <span class=" badge badge-info">setting</span>
                         @else 
                         @endif
                    
                
                </td>
               
           
                  <td>
    
                  <a href="{{url('delete/user/'.$row->id)}}" id="delete" class="btn  btn-danger btn-sm" title="delete" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  <a href="{{url('Edit/user/'.$row->id)}}"  class="btn  btn-primary btn-sm" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
       
                  
                      
               
                 
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