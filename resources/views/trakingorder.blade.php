 @extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}"> 
	<div class="cart">
                        
        
	<div class="cart_section">
		<div class="container">
		 <div class=" row">
             <div class=" col-6" >
                <div class=" p-3" style=" background-color:rgb(183, 183, 135)">
                        <h3>  Order date : {{$data->date}}</h3> <hr>
                
                     @if ($data->statuse==0)
                      <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>  
                      </div>
                      <div>
                            <h4> statuse: <strong class=" text-danger">panding</strong></h4> 
                      </div>
                 
                     @elseif($data->statuse==1)
                        <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> 
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div> 
                      </div>
                   
                   
                    <h4>statuse: <strong class=" text-success">Payment accepted</strong></h4> 

                     @elseif($data->statuse==2)
                         <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> 
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div> 
                          <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                    <h4>statuse: <strong class=" text-info">orders progressing</strong></h4>
                     @elseif($data->statuse==3)
                         <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div> 
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div> 
                          <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                           <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                     <h4>statuse: <strong class=" text-success">order done</strong> </h4>
                     @elseif($data->statuse==4)
                     <div class=" bg-danger">
                         <h3>statuse: <strong class=" text-black">your order is canceled</strong></h3> 
                        
                     </div> <br>
                     <div class=" bg-info">
                      <h3> <strong class=" text-black">contact us for details :+880172882888</strong></h3> 
                        
                     </div>
                         
                     @endif
                     </div>
 

             </div>

             <div class=" col-6 bg-primary " >
                 <div class=" p-4" style=" background-color:rgb(190, 194, 197)">
                         <h3>   pay type : <br>{{$data->pay_type}} </h3>  <hr>              
                    <h3>   payment method : <br>{{$data->payment_method}} </h3>  <hr>              
                    <h3>    transection id : <br>{{$data->bln_transection }}</h3>  <hr>
                    <h3>   order id  : <br>{{$data->order_id}}</h3> <hr>
                    <h3>   subtotal : <br>{{$data->subtotal}}tk</h3>  <hr>
                     <h3>    paying amount : <br>{{$data->paying_amount}}$</h3> 

                 </div>
                
                
             

             </div>

         </div>
		</div>
	</div>

<script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection