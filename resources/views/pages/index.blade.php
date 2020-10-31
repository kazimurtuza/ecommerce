@extends('layouts.app')
@section('content')
	@php
		$Allproduct=DB::table('products')->get()->all();
		$featured=DB::table('products')->where('status',1)->get();
		$trend=DB::table('products')->where('trend',1)->where('status',1)->get();
		$bestrated=DB::table('products')->where('best_rated',1)->where('status',1)->get();
		$hotdeals=DB::table('products')->join('brands','brands.id','=','products.brand_id')->where('products.hot_deal',1)->where('products.status',1)->get();
		
		
	@endphp
   
@include('layouts.menuber')


	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider ">
								
								<!-- Deals Item -->
								@foreach ($hotdeals as $item)

								<div class="owl-item deals_item">
									<div class="deals_image"><img src="{{$item->image_one}}" height="230px" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">Headphones</a></div>
											@if ($item->discount_price !==null)
										<div class="deals_item_price_a ml-auto">{{$item->selling_price}}TK</div>
											@endif
											
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name">{{$item->product_name}}</div>
											@if ($item->discount_price !==null)
										<div class="deals_item_price ml-auto">{{$item->discount_price}}TK</div>
										@else
										<div class="deals_item_price ml-auto">{{$item->selling_price}}TK</div>
												
											@endif
											
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
											<div class="available_title">Available: <span>{{$item->product_quantity}}</span></div>
												<div class="sold_title ml-auto">Already sold: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">Hurry Up</div>
												<div class="deals_timer_subtitle">Offer ends in:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>hours</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>mins</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>secs</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach

							

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
								
								
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
					
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($featured as $item)
									<div class="featured_slider_item active">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px" alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price text-danger" style="padding:0px;margin-top:0px" >{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</span> </div>
												
													@else 
													<div class="product_price" style="padding:0px;margin-top:0px">{{$item->selling_price}} tk</div>
												@endif 
												<div class="product_name"><div><a href="{{url('see/product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
														<div class="product_extras">
														<button class="product_cart_button addtocard" data-id="{{$item->id}}"  data-toggle="modal"   data-target="#exampleModalCenter">Add to Cart</button>
													</div>


											
											</div>
										<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
										{{-- <a href="{{url('wishlist/'.$item->id)}}"><div class="product_fav"><i class="fas fa-heart"></i></div></a> --}}
											
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%

													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
									@endforeach 
								

									
								

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>

							

							<!-- Product Panel -->
							
							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($trend as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px"  alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price  text-danger">{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</div>
													@else 
													<div class="product_price">{{$item->selling_price}} tk</div>
												@endif
												<div class="product_name"><div><a href="">{{$item->product_name}}</a></div></div>
												<div class="product_extras">
														<button class="product_cart_button">Add to Cart</button>
													</div>
											
											</div>
										<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%
													
														
														
													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
									@endforeach 

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>
							<!-- Product Panel -->
							
							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($bestrated as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px"  alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price text-danger">{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</div>
													@else 
													<div class="product_price">{{$item->selling_price}} tk</div>
												@endif
												<div class="product_name"><div><a href="">{{$item->product_name}}</a></div></div>
												<div class="product_extras">
														<button class="product_cart_button">Add to Cart</button>
													</div>
											
											</div>
												<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%
													
														
														
													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
									@endforeach 

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>

							

					
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->
                <div class="container">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Discount offers</li>
									<li >Buyone Getone</li>
									<li >Best Rated</li>
								
								
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
					
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($Allproduct as $item)
									 @if ($item->discount_price==!null)
									 <div class="featured_slider_item active">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px" alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price text-danger" style="padding:0px;margin-top:0px" >{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</span> </div>
												
													@else 
													<div class="product_price" style="padding:0px;margin-top:0px">{{$item->selling_price}} tk</div>
												@endif 
												<div class="product_name"><div><a href="{{url('see/product/details/'.$item->id.'/'.$item->product_name)}}">{{$item->product_name}}</a></div></div>
														<div class="product_extras">
														<button class="product_cart_button addtocard" data-id="{{$item->id}}"  data-toggle="modal"   data-target="#exampleModalCenter">Add to Cart</button>
													</div>


											
											</div>
										<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
										{{-- <a href="{{url('wishlist/'.$item->id)}}"><div class="product_fav"><i class="fas fa-heart"></i></div></a> --}}
											
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%

													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
										 
									 @endif
									
									@endforeach 
								

									
								

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>

							

							<!-- Product Panel -->
							
							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($Allproduct as $item)
									@if($item->buyone_getone==1)
	
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px"  alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price  text-danger">{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</div>
													@else 
													<div class="product_price">{{$item->selling_price}} tk</div>
												@endif
												<div class="product_name"><div><a href="">{{$item->product_name}}</a></div></div>
												<div class="product_extras">
														<button class="product_cart_button">Add to Cart</button>
													</div>
											
											</div>
										<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%
													
														
														
													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
										@endif
									@endforeach 

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>
							<!-- Product Panel -->
							
							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach ($bestrated as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image p-4 d-flex flex-column align-items-center justify-content-center"><img src="{{url($item->image_one)}}" height="120"  width="130px"  alt=""></div>
											<div class="product_content">
													@if ($item->discount_price !== null)
													<div class="product_price text-danger">{{$item->discount_price}} tk <span>{{$item->selling_price}}tk</div>
													@else 
													<div class="product_price">{{$item->selling_price}} tk</div>
												@endif
												<div class="product_name"><div><a href="">{{$item->product_name}}</a></div></div>
												<div class="product_extras">
														<button class="product_cart_button">Add to Cart</button>
													</div>
											
											</div>
												<button class="wishlist" data-id="{{$item->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
											<ul class="product_marks">
													@if ($item->discount_price !== null)
														@php
															$a=$item->selling_price-$item->discount_price;
															$b=($a*100)/$item->selling_price;

														@endphp
													<li class="product_mark product_discount">-{{intval($b)}}%
													
														
														
													</li>
													@else 
										<li class="product_mark product_discount" style=" background:rgb(40, 177, 44)">new</li>
												@endif
												
											</ul>
										</div>
									</div>
									@endforeach 

								

					              </div>
								<div class="featured_slider_dots_cover"></div>
							
							</div>

							

					
					</div>
	             </div>

				</div>







	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_1.png')}}" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_2.png')}}" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{asset('public/frontend/images/adv_3.png')}}" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Trends -->


	<!-- Reviews -->

	<!-- Recently Viewed -->


	</div>

		{{-- add cart modal --}}


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class=" row">
			<div class=" col-4">
				<div>
					<img src="" alt="no image found" height="300px" width=" 100%" id="pimage">
				</div>
			</div>
			<div class=" col-5">
				<ul class="list-group">
					<li class=" list-group-item">name: <span id="pname"></span></li>
					<li class=" list-group-item">code: <span id="code"></span></li>
					<li class=" list-group-item">category: <span id="category"></span></li>
					<li class=" list-group-item">subcategory: <span id="subcate"></span></li>
					<li class=" list-group-item">brand: <span id="brand"></span></li>
					<li class=" list-group-item">stock: <span id="pname"></span></li>
				</ul>

			</div>
			<div class=" col-3">
				<form  action="{{route('add.in.cart')}}" method="post">
					@csrf
					<input type="hidden" name="pid" id="pid">
                    <div class=" form-group">
						<label for="">quantity</label>
						<input type="number" class=" form-control" style=" width:70px;margin-left:11px" value="1" class=" form-control" name="quantity" >
					</div>
                    <div class=" form-group">
						<label for="">color</label>
						<select style=" width:70px"  class=" form-control"  name="color" id="pcolor">
							<option value="">red</option>
							<option value="">blue</option>
						</select>
					</div>
                    <div class=" form-group">
						<label for="">size</label>
						<select style=" width:70px"  class=" form-control"  name="size" id="size">
							<option value="">m</option>
							<option value="">l</option>
						</select>
					</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save in cart</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_1.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_2.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_3.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_4.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_5.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_6.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_7.jpg')}}" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{asset('public/frontend/images/brands_8.jpg')}}" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{asset('public/frontend/images/send.png')}}" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">

							<form action="{{route('store.newslater')}}" method="post" class="newsletter_form">
								@csrf
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address" name="email">
								<button type="submit" class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$('.wishlist').on('click',function(){
			$id=$(this).data('id');
			$.get('{{route('wishlist')}}',{id:$id},function(data){
                   
				    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })
					
						    if(data.success){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }
					
 
     		})
			
	})

	// $('.addtocard').on('click',function(){
	// 	$id=$(this).data('id');
	// 	$.get('{{route('addcart')}}',{id:$id},function(data){
	// 		  const Toast = Swal.mixin({
    //                       toast: true,
    //                       position: 'top-end',
    //                       showConfirmButton: false,
    //                       timer: 3000
    //                     })
					
	// 					    if(data.success){
    //                         Toast.fire({
    //                           type: 'success',
    //                           title: data.success
    //                         })
    //                    }else{
    //                          Toast.fire({
    //                             type: 'error',
    //                             title: data.error
    //                         })
    //                    }
					

	// 	})
		
	// })
	$('.addtocard').on('click',function(){
		$id=$(this).data('id');
		$.get('{{route('details.addcart')}}',{id:$id},function(data){

			$color=data.colour;
			$('#pimage').attr('src',data.product.image_one);
			$('#pname').text(data.product.product_name);
			$('#category').text(data.product.category_name);
			$('#subcate').text(data.product.subcategory_name);
			$('#code').text(data.product.product_code);
			$('#brand').text(data.product.brand_name);
			$('#pid').val(data.product.id);
			$('select[name="color"]').empty();
			$.each(data.colour,function(key,value){
				$('select[name="color"]').append('<option value="'+value+'">'+ value+'</option>');
			})

				$('select[name="size"]').empty();
			$.each(data.size,function(key,value){
				$('select[name="size"]').append('<option value="'+value+'">'+ value+'</option>');
			})
	
                     
	
                       })
					

		})
		
		



	



</script>
@endsection