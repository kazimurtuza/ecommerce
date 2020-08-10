@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}"> 
	<div class="cart">
                        
        
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach ($cart as $item)
                                    
                                
								<li class="cart_item clearfix">
                                <div class="cart_item_image"><img src="{{url($item->options->image)}}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
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
                                            <br>
                                        <form action="{{route('update.cart')}}" method="post">
                                                @csrf
                                        <input type="number" name="qty" value="{{$item->qty}}" style=" width:40px; margin-top:15px; text:center" id="">
                                        <input type="hidden" name="id" value="{{$item->rowId}}">
                                        
                                        <button type="submit" class=" btn btn-success btn-sm"><i class="far fa-check-square"></i></button>
                                        
                                            </form>
                                            
											{{-- <div class="cart_item_text">{{$item->qty}}</div> --}}
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">{{$item->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">{{$item->price * $item->qty }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">action</div>
                                            <div class="cart_item_text"> 
                                            <a href="{{url('delete/cart/item/'.$item->rowId)}}"><i class="fas fa-trash-alt" style=" color:red"></i></a>
                                            
                                           
                                            
                                            </div>
										</div>
									</div>
                                </li>
                                <br><hr>
                                @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total row">
                            <div class=" col-6">
								
								@if (Session::has('coupon'))
								<br><br> <br>
								<div class=" p-3 text-center" style="margin-left: -25px;
                                          background: rgb(138, 167, 118);
                                          border: solid 2px rgb(187, 187, 187);
                                          background-color: #6d946c;
                                          box-shadow: 1px 1px 6px 1px black;
                                          color: #1b1d1b;">
									<div class="order_total_title">Active Coupon:</div>
										   <div class="order_total_amount">{{Session::get('coupon')[0]['name']}} </div> <br>
									<div class="order_total_title">Coupon Discount:</div>
										   <div class="order_total_amount">{{Session::get('coupon')[0]['discount']}} TK </div>
										  <br>
								
								<a href="{{route('coupon.session.delete')}}" class="btn btn-danger btn-sm"> coupon inactive</a>


								</div>
									

								@else
								<br><br><br><br>

									<form action="{{route('coupon.apply')}}" method="POST"> 
								@csrf
                                <div class=" form-group">
                                <label for="">Apply Coupon</label>
                                <input type="text" class=" form-control" name="coupon" placeholder=" Coupon code" required>

                                </div>

                                <button type="submit" class=" btn btn-success">submit</button>
                                </form>
									
								@endif
							

                            </div>
                            <div  class=" col-6">

								@if ( Session::has('coupon'))
								   		<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
										   <div class="order_total_amount">{{Session::get('coupon')[0]['amount']}} TK </div>
    							</div>

								@else
								   		<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">{{Cart::subtotal()}}</div>
							</div>
									
								@endif
                             
							<div class="order_total_content text-md-right">
								<div class="order_total_title">shipping Charge:</div>
								<div class="order_total_amount">{{Cart::subtotal()}}</div>
							</div>
							<div class="order_total_content text-md-right">
								<div class="order_total_title">vat:</div>
								<div class="order_total_amount">{{Cart::subtotal()}}</div>
                            </div>
                            	<div class="order_total_content text-md-right">
								<div class="order_total_title">Total:</div>
								<div class="order_total_amount">{{Cart::subtotal()}}</div>
                            </div>
							<br><br>
						<a href="{{route('final.checkout')}}" class=" btn btn-success m-1" style=" float:right;">Final step</a>
							<a href="" class=" btn btn-danger m-1" style=" float:right">Delete Cart</a>
							
							
                            </div>
						
					
							
                        </div>
                      <br><br><br><br><br><br><br>
				
                    

						{{-- <div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
						<a href="{{route('user.checkout')}}" class="button cart_button_checkout">Checkout</a>
						
						</div> --}}
					</div>
				
							
				</div>
				
			</div>
		</div>
	</div>
		<br><br><hr><hr>

<script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection