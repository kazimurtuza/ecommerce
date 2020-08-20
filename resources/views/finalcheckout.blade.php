@extends('layouts.app')
@section('content')
<div>
    <div class=" row  pl-lg-5 ml-lg-5" style=" margin:auto">
        <div class="col-lg-5 col-sm-12 ml-3">
            <div class="container cart_container p-5 bg-light" style=" border:solid black 2px;">
                        <h2 class="cart_title text-center">Shopping Cart</h2>
                        <br><hr><br>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($cart as $item)
                                    
                                
								<li class="cart_item clearfix">
                                
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_image"><img src="{{url($item->options->image)}}" alt="" height="40px" width="40px"></div>
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
                                        <div class="cart_item_text">{{$item->name}}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
                                        <div class="cart_item_text">{{ $item->options->color}}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">size</div>
											<div class="cart_item_text">{{$item->options->size}}</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">{{$item->qty}}</div>
										</div>
										
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">{{$item->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">{{$item->price * $item->qty }}</div>
										</div>
										{{-- <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">action</div>
                                            <div class="cart_item_text"> 
                                            <a href="{{url('delete/cart/item/'.$item->rowId)}}"><i class="fas fa-trash-alt" style=" color:red"></i></a>
                                            
                                           
                                            
                                            </div>
										</div> --}}
									</div>
                                </li>
                                <br><hr>
                                @endforeach
							</ul>
						</div>

        </div>
                                @php
									$shipping=DB::table('extracharges')->first();
								@endphp
            <div class="container cart_container p-5 bg-success" style=" border:solid black 2px;">
                       
                        
						<div class="cart_items">
                            	<ul class="cart_list text-center">
								<li class="cart_item clearfix float-right text-center">

                                    	@if ( Session::has('coupon'))
								   		
										SubTotal :    {{Session::get('coupon')[0]['amount']}} TK 
    							

								@else
								   	
								SubTotal : {{Cart::subtotal()}}
							
									
								@endif
                                   
                                    
                                </li>
                                <br>
								<li class="cart_item clearfix float-right text-center">
                                     shipping  charge :{{$shipping->shipping}}
                                </li>
                                <br>
								<li class="cart_item clearfix float-right">
                                     vat :{{$shipping->vat}}
                                </li>
                                <br>
                                	@php
									$subtotal=str_replace(",", "",Cart::subtotal())
								    
								@endphp
								<li class="cart_item clearfix float-right">
                                    		@if ( Session::has('coupon'))
								   		<div  class=" float-right">
                                                  BD Total :	 {{Session::get('coupon')[0]['amount']+$shipping->shipping + $shipping->vat}} TK

                                           </div>
							<hr>
                                     <h5> USD Total :{{(Session::get('coupon')[0]['amount']+$shipping->shipping + $shipping->vat)/84.7631}}$
                                        @php
                                            $totalamount=(Session::get('coupon')[0]['amount']+$shipping->shipping + $shipping->vat)/84.7631
                                        @endphp

                                         {{session::forget('totalpay')}}
                                       
                                         {{session::put('totalpay',$totalamount)}}
                              </h5>             
                              
                             
    							

								@else
								   		
							<div  class=" float-right">
                               BD Total : {{$subtotal+$shipping->shipping + $shipping->vat}} TK

                              
                            </div><hr>
                            @php
                                 $totalamount=($subtotal+$shipping->shipping + $shipping->vat)/84.7631
                            @endphp
                            
                                

                                      <h5> USD Total :{{$totalamount}} <span style=" text:10px">$</span>

                                        
                                         {{session::forget('totalpay')}}
                                       
                                         {{session::put('totalpay',$totalamount)}}
                                        
                              </h5>  
							
									
								@endif



                                    
                                    
                                </li>
                                </ul>


                                
                            
                        </div>

        </div>
   
        </div>
        <div class="col-lg-5 col-sm-10  " >
        <form action="{{route('paynow')}}" method="post">
            @csrf
            <div class="container p-5 bg-light " style=" border:solid black 2px;"> 
                <h2 class="cart_title text-center">shipping Cart</h2><br><hr>
                 <div class=" form-group">
                <label for="">Full Name</label>
                <input type="text" class=" form-control" name="name" placeholder="Full Name" required>

            </div>
            <div class=" form-group">
                <label for="">Phone</label> 
                <input type="text" class=" form-control" name="phone" placeholder="Phone" required>

            </div>
            <div class=" form-group">
                <label for="">Email</label>
                <input type="email" class=" form-control" name="email" placeholder="Email" required>

            </div>
            <div class=" form-group">
                <label for="">Address</label>
                <input type="text" class=" form-control" name="address" placeholder="Address">

            </div>
            <div class=" form-group">
                <label for="">city</label>
                <input type="text" class=" form-control" name="city" placeholder="City">

            </div>
            <hr><hr>


            


            <h3>payment</h3><hr>

            <div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><input type="radio" name="payment" value="stripe" id="" required> <a href="#"><img src="{{asset('public/frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><input type="radio" name="payment" value="ideal" id="" required> <a href="#"><img src="{{asset('public/frontend/images/logo_4.png')}}" height="30px" alt=""></a></li>
								<li><input type="radio" name="payment" value="paypal" id="" required> <a href="#"><img src="{{asset('public/frontend/images/logos_3.png')}}" alt=""></a></li>
						
						</div>

                          <br><br>
                        <button type="submit" class=" btn btn-success">paynow</button>
                         
            </div>

           
        </div>
    
        </form>


         
    
    
</div>
@endsection