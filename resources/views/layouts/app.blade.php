

<!DOCTYPE html>
<html lang="en">
<head>
<title>Daily Sell</title>
<meta name="csrf" value="{{csrf_token()}}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Daily Sell  shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="sweetalert2.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_responsive.css')}}">


    {{-- toastr --}}
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	 {{-- end toastr --}}

	 {{-- stripe link --}}
	 <script src="https://js.stripe.com/v3/"></script>
	 



</head>

<body>
	@php
		$company_info=DB::table('sitesettings')->first();
	@endphp

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/phone.png')}}" alt=""></div>{{$company_info->phone_one}}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/mail.png')}}" alt=""></div><a href="{{$company_info->company_Email}}">{{$company_info->company_Email}}</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									@if (session()->get('language')=='bangla')
										
										<li>
										<a href="{{route('post.english')}}">English<i class="fas fa-chevron-down"></i></a>
									 
									</li>
									  @else
									  	<li>
											<a href="{{route('post.bangla')}}">Bangla<i class="fas fa-chevron-down"></i></a>
									
									</li>
								
									@endif
									
								
								
								</ul>
							</div>
							<div class="top_bar_user">
								{{-- <div class="user_icon"><img src="{{asset('public/frontend/images/user.svg')}}" alt=""></div> --}}

								@guest
								@if (session()->get('language')=='bangla')
								   <div><a href="{{route('login')}}"><div class="user_icon"><img src="{{asset('public/frontend/images/user.svg')}}" alt=""></div>লগইন/রেজিস্টার</a></div>

								@else
								   <div><a href="{{route('login')}}"><div class="user_icon"><img src="{{asset('public/frontend/images/user.svg')}}" alt=""></div>Login/Register</a></div>
									
								@endif
                                 
								@else
									
							      <div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">

										<li><a href=""  data-toggle="modal" data-target="#exampleModal"><div class="user_icon"></div>Tracking Order</a></li>
									<li>
										<a href="{{route('register')}}"><div class="user_icon"><img src="{{asset('public/frontend/images/user.svg')}}" alt=""></div>profile</a>
										<ul>
											<li><a href="{{route('user.wishlist')}}">Wishlist</a></li>
										<li><a href="{{route('user.checkout')}}">Checkout</a></li>
											<li><a href="#">others</a></li>
										</ul>
									</li>
									

								
								</ul>
							</div>
									
									
								@endguest
                            
								
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}">{{$company_info->company_name}}</a></div>
						</div>
					</div>

					<!-- Search -->
					@php
						$cate=DB::table('categories')->get();
					@endphp
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
								<form action="{{route('searchproduct')}}" method="POST" class="header_search_form clearfix">
									@csrf
										<input type="search" required="required" name="search" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													@foreach ($cate as $item)
												<li><a class="clc" href="#">{{$item->category_name}}</a></li>
													@endforeach
												
										
												</ul>
											</div>
										</div>
										
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('public/frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							@guest

							@else
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="{{asset('public/frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									@php
								$list=DB::table('wishlists')->where('user_id',Auth::id())->get()
									@endphp
									<div class="wishlist_text"><a href="{{route('user.wishlist')}}">Wishlist</a></div>
								<div class="wishlist_count">{{count($list)}}</div>
								</div>
							</div>
								
							@endguest
							

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('public/frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
									<div class="cart_text"><a href="{{route('cart.show')}}">Cart</a></div>
									<div class="cart_price">{{Cart::Subtotal()}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		
   @yield('content')
	

	<!-- Footer -->


	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
						<div class="logo"><a href="#">{{$company_info->company_name}}</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{$company_info->phone_one}}</div>
						<div class="footer_contact_text">
							<p>{{$company_info->company_address}}</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{$company_info->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{$company_info->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{$company_info->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div> 


				{{-------------------------- modal for Tracking ---------------------------------}}
			
               
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"                    aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order tracking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
					  <form action="{{route('trackOrder')}}" method="POST">
						@csrf
						   <div class=" form-group">
							   <label for="">Traking code</label>
							   <input type="text" class=" form-control" name="code" required> 

						   </div>

						   

						<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">check</button>
                      </div>
					   </form>
                      </div>
                  
                    </div>
                  </div>
                </div>





				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('public/frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>


<script src="{{asset('public/frontend/js/product_custom.js')}}"></script>







  {{-- for error or success message  --}}
  {{-- toastr --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
	</script>
	
	{{-- for error or success message  --}}
</body>

</html>