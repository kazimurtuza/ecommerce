@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}"> 
	<div class="cart">
                        
        
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					@if (cart::count()>0)
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
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">{{Cart::subtotal()}}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Add to Cart</button>
						<a href="{{route('user.checkout')}}" class="button cart_button_checkout">Checkout</a>
						
						</div>
					</div>

					@else

					<div class="cart_container text-center">

						<h3>There are no items in this cart</h3>

					</div>
						
					@endif
					
				</div>
			</div>
		</div>
	</div>

<script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection