  @extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h4>NewOrder's Details</h4>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
         

    

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-5 p-3 bg-info" style=" border-left:solid rgb(53, 48, 48) 3px">
                   <h4 class="card-body-title">shipping details</h4><hr>
                  <h6 style=" color:black"> name :  {{$datashipping->ship_name}}</h6> <hr>
                  <h6 style=" color:black"> email : {{$datashipping->ship_email}}</h6><hr>
                  <h6 style=" color:black"> phone : {{$datashipping->ship_phone}}</h6><hr>
                  <h6 style=" color:black"> address : {{$datashipping->ship_address}}</h6><hr>
                  <h6 style=" color:black"> City : {{$datashipping->ship_city}}</h6><hr>

              
              </div>
                 
              <div class="col-lg-6 ml-2 pl-5 ml-5  p-3 bg-secondary float-left" style=" border-left:solid rgb(53, 48, 48) 3px">
                  <h4 class="card-body-title">Order INFO</h4><hr>
                  <h6 style=" color:black">Payment_method  :  {{$orderinfo->payment_method}}</h6><hr>
                  <h6 style=" color:black">Paying_amount :  {{$orderinfo->paying_amount}}</h6><hr>
                  <h6 style=" color:black">Transection ID  :  {{$orderinfo->bln_transection}}</h6><hr>
                  <h6 style=" color:black">subtotal  :  {{$orderinfo->subtotal}} tk</h6><hr>
                  <h6 style=" color:black">Shipping  :  {{$orderinfo->shipping}} tk</h6><hr>
                  <h6 style=" color:black">TOTOL  :  {{$orderinfo->total /100}} $</h6><hr>
             
                @if ($orderinfo->statuse==0)
                  <h6 style=" color:black">Statuse : <span class=" badge badge-danger">panding</span> </h6><hr> 
              
                @elseif($orderinfo->statuse==1)
                  <h6 style=" color:black">Statuse :   <span class=" badge badge-info"> payment accepted</span>  </h6><hr>
       
                @elseif($orderinfo->statuse==2)
                  <h6 style=" color:black">Statuse :    <span class=" badge badge-primary">Delevery Progress </span> </h6><hr>
       
                @elseif($orderinfo->statuse==3)
                  <h6 style=" color:black">Statuse :  <span class=" badge badge-success">Delevery done</span> </h6><hr>
     
                @elseif($orderinfo->statuse==4)
                  <h6 style=" color:black">Statuse : <span class=" badge badge-danger">invalied order </span> </h6><hr>
              
                   @else
               @endif


              
         




              
              </div>
            </div><!-- row -->
            <br> <hr>
           
          <h1 class="card-body-title text-center bg-warning" style=" padding: 15px 1px">Product details</h1><hr>
            <div class="row">
                         <div class="col-lg-12  " >


            <table class="table table-striped">
              <thead>
            
                    
         
                <tr>
                  <th class="wd-15p">Payment type</th>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-20p">Color</th>
                  <th class="wd-20p">Size</th>
                  <th class="wd-20p">Quantity</th>
                  <th class="wd-20p">Single Price</th>
                  <th class="wd-20p">Total Price</th>
             
                </tr>
              </thead>
              <tbody>

                   @foreach ($details as $row)
                <tr>
                <td> <img src="{{url($row->image_one)}}" alt="" height="50px" width=" 50px">  </td>
                  <td>{{$row->product_code}}</td>
                  <td>{{$row->product_name}}</td>
                  <td>{{$row->color}} </td>
                  <td>{{$row->size}} </td>
                  <td>{{$row->qty}} </td>
                  <td>{{$row->single_price}} </td>
                  <td>{{$row->total_price}} </td>
                

                  
                </tr>
                       @endforeach
             
          
              </tbody>
            </table>
    


            </div>

                      @if ($orderinfo->statuse==0)
                     <a href="{{url('admin/payment/accept/'.$orderinfo->id)}}" class=" btn btn-success btn-block p-2 m-3">Payment Accept</a>
            <a href="{{url('admin/order/cancel/'.$orderinfo->id)}}" id="delete" class=" btn btn-danger btn-block p-2 m-3">Order cancel</a>
              
                @elseif($orderinfo->statuse==1)
                     <a href="{{url('admin/Delevery/Progress/'.$orderinfo->id)}}" class=" btn btn-success btn-block p-2 m-3">Delevery Progress</a>
                     <strong class=" text-info"> This orders payment alredy checked now you can progress it's delevery</strong>
          
                @elseif($orderinfo->statuse==2)
                  <a href="{{url('admin/Delevery/Done/'.$orderinfo->id)}}" class=" btn btn-success btn-block p-2 m-3">Delevery Done</a>
                  
                @elseif($orderinfo->statuse==4)
                <strong class=" bg-danger"> This order is rejected</strong>
              
                   @else
               @endif
     

          
          </div><!-- form-layout -->
        </div><!-- card -->


        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 
    
@endsection