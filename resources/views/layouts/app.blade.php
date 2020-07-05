{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/images/favicon.png" >
        <!--Page title-->
        <title>Admin DIT</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="{{asset('public/panel/assets/css/bootstrap.min.css')}}">
        <!--font awesome-->
        <link rel="stylesheet" href="{{asset('public/panel/assets/css/all.min.css')}}">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{asset('public/panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{asset('public/panel/assets/css/style.css')}}">
    </head>
    <body id="page-top">
        <!-- preloader -->
        <div class="preloader">
            <img src="{{ asset('public/panel/assets/images/preloader.gif')}}" alt="">
        </div>
        <!-- wrapper -->
        <div class="wrapper">
           @guest
           @else
            <!-- header area -->
            <header class="header_area">
                <!-- logo -->
                <div class="sidebar_logo">
                    <a href="index.html">
                        <img src="{{ asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid logo1">
                        <img src="{{ asset('public/panel/assets/images/logo_small.png')}}" alt="" class="img-fluid logo2">
                    </a>
                </div>
                <div class="sidebar_btn">
                    <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
                </div>
                <ul class="header_menu">
                    <li><a href="#" class="search_btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></a>
                        <div class="modal fade search_box" id="myModal">
                              <button type="button" class="close m-2 text-white float-right" data-dismiss="modal">&times;</button>
                              <form action="#" class="modal-dialog modal-lg">
                                
                                <div class="modal-content bg-transparent">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <input class="form-control bg-transparent text-white form-control-lg"  type="text" placeholder="Search...">
                                        <button class="btn btn-lg submit-btn" type="submit">Search</button>
                                      </div>
                                </div>
                                 
                              </form>
                        </div>
                    </li>
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-envelope"></i><span>4</span></a>
                        <div class="dropdown_wrapper messages_item dropdown-menu dropdown-menu-right">
                            <div class="dropdown_header">
                                <p>you have 4 messages</p>
                            </div>
                            <ul class="dropdown_body nice_scroll scrollbar">
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user1.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Madelyn <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello Sam...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user2.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Melvin <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello jhon...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user3.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Olinda <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello jhon...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user1.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Johnson <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello Olinda...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user3.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Madelyn <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello Sam...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user2.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Melvin <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello jhon...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user3.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Olinda <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello jhon...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <img src="assets/images/user1.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="text-part">
                                            <h6>Johnson <span><i class="far fa-clock"></i> today</span></h6>
                                            <p>Hello Olinda...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown_footer">
                                <a href="#">See All Messages</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" data-toggle="dropdown"><i class="far fa-bell"></i><span>9</span></a>
                        <div class="dropdown_wrapper notification_item dropdown-menu dropdown-menu-right">
                            <div class="dropdown_header">
                                <p>You have 9 notifications</p>
                            </div>
                            <ul class="dropdown_body scrollbar nice_scroll">
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-success"><i class="fas fa-users"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p>5 new members joined</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> Very long description here that may...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-success"><i class="fas fa-cart-plus"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> 25 sales made</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-warning"><i class="fas fa-user"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> You changed your username</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-success"><i class="fas fa-users"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p>5 new members joined</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> Very long description here that may...</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-success"><i class="fas fa-cart-plus"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> 25 sales made</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="img-part">
                                            <span class="text-warning"><i class="fas fa-user"></i></span>
                                        </div>
                                        <div class="text-part">
                                            <p> You changed your username</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown_footer">
                                <a href="#">view All</a>
                            </div>
                        </div>
                    </li>
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                            <div class="user_item dropdown-menu dropdown-menu-right">
                                <div class="admin">
                                    <a href="#" class="user_link"><img src="assets/images/admin.jpg" alt=""></a>
                                </div>
                            <ul>
                                
                                <li><a href="#"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                                <li><a href="{{route('password.change')}}"><span><i class="fas fa-cogs"></i></span>  Password Change</a></li>
                                <li>

                                    <a href="{{route('user.logout')}}"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>

                        <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
            </header><!-- / header area -->
            <!-- sidebar area -->
            <aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
                 <ul class="metismenu" id="menu1">
                    <li class="single-nav-wrapper">
                        <a href="index.html" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">home</span>
                        </a>
                      </li>
                    <li class="single-nav-wrapper">
                          <a class="menu-item" href="fomrs_editor_ch.html" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-edit"></i></span>
                              <span class="menu-text">Forms</span>
                          </a>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-table"></i></span>
                              <span class="menu-text">table</span>
                          </a>
                            <ul class="dashboard-menu">
                              <li><a href="basic_table.html">Basic table</a></li>
                              <li><a href="data_table.html">data table</a></li>
                            </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                            <span class="menu-text">Charts</span>
                          </a>
                            <ul class="dashboard-menu">
                              <li><a href="chart-float.html">Float Chart</a></li>
                              <li><a href="chart-float.html">Float Chart</a></li>
                              <li><a href="chart-float.html">Float Chart</a></li>
                           </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                            <span class="menu-text">UI Elements</span>
                          </a>
                            <ul class="dashboard-menu">
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="button.html">Buttons</a></li>
                                <li><a href="notification.html">Notification</a></li>
                                <li><a href="panels.html">Panels</a></li>
                                <li><a href="tabs.html">Tab</a></li>
                                <li><a href="modals.html">Modals</a></li>
                                <li><a href="progressbars.html">Progressber</a></li>
                                <li><a href="list.html">List View</a></li>
                                <li><a href="icheck_toggle_pagination.html">iCheck, Toggle</a></li>
                                <li><a href="label-badge-alert.html">labels, Badges</a></li>
                                <li><a href="treeview.html">Tree View</a></li>
                           </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="menu-text">Maps</span>
                          </a>
                          <ul class="dashboard-menu">
                            <li><a href="#">Amcharts Maps</a></li>
                            <li><a href="#">Data Maps</a></li>
                            <li><a href="#">Jvector Maps</a></li>
                            <li><a href="#">Google map</a></li>
                            <li><a href="#">Snazzy Map</a></li>
                          </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-envelope"></i></span>
                            <span class="menu-text">Mailbox</span>
                          </a>
                          <ul class="dashboard-menu">
                            <li><a href="#">Mailbox</a></li>
                            <li><a href="#">Mailbox Details</a></li>
                            <li><a href="#">Compose</a></li>
                          </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-mobile-alt"></i></span>
                            <span class="menu-text">App View</span>
                          </a>
                          <ul class="dashboard-menu">
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="#">Vertical timeline</a></li>
                            <li><a href="#">Horizontal timeline</a></li>
                            <li><a href="#">Pricing Table</a></li>
                          </ul>
                      </li>
                      <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="far fa-copy"></i></span>
                            <span class="menu-text">Other pages</span>
                          </a>
                          <ul class="dashboard-menu">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="registration.html">Register</a></li>
                            <li><a href="screen_lock.html">screen lock</a></li>
                            <li><a href="forget.html">forget Password</a></li>
                          </ul>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="#" class="menu-item">
                            <span class="left-icon"><i class="fas fa-home"></i></span>
                            <span class="menu-text">Calender</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="blank_page.html" class="menu-item">
                            <span class="left-icon"><i class="fas fa-file"></i></span>
                            <span class="menu-text">Blank Page</span>
                        </a>
                      </li>
                    </ul>
              </nav>
            </aside><!-- /sidebar Area-->


           @endguest

           @yield('content')
        </div><!--/ wrapper -->


        
        <!-- jquery -->
        <script src="{{asset('public/panel/assets/js/jquery.min.js')}}"></script>
        <!-- popper Min Js -->
        <script src="{{asset('public/panel/assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{asset('public/panel/assets/js/bootstrap.min.js')}}"></script>
        <!-- Fontawesome-->
        <script src="{{asset('public/panel/assets/js/all.min.js')}}"></script>
        <!-- metis menu -->
        <script src="{{asset('public/panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('public/panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
        <!-- nice scroll bar -->
        <script src='{{asset('public/panel/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}'></script>
        <script src="{{asset('public/panel/assets/plugins/scrollbar/scroll.active.js')}}"></script>
        <!-- counter -->
        <script src="{{asset('public/panel/assets/plugins/counter/js/counter.js')}}"></script>
        <!-- chart -->
        <script src='{{asset('public/panel/assets/plugins/chartjs-bar-chart/Chart.min.js')}}'></script>
        <script src="{{asset('public/panel/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
        <!-- pie chart -->
        <script src="{{asset('public/panel/assets/plugins/pie_chart/chart.loader.js')}}"></script>
        <script src="{{asset('public/panel/assets/plugins/pie_chart/pie.active.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <!-- Main js -->
        <script src="{{asset('public/panel/assets/js/main.js')}}"></script>

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


    </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/responsive.css')}}">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/phone.png')}}" alt=""></div>+38 068 005 3570</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('public/frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li>
									<li>
										<a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">EUR Euro</a></li>
											<li><a href="#">GBP British Pound</a></li>
											<li><a href="#">JPY Japanese Yen</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="{{asset('public/frontend/images/user.svg')}}" alt=""></div>
                            <div><a href="{{route('register')}}">Register</a></div>
								<div><a href="{{route('login')}}">Sign in</a></div>
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
							<div class="logo"><a href="{{url('/')}}">Ecommerce</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li>
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
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="{{asset('public/frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count">115</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('public/frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>10</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="#">Cart</a></div>
										<div class="cart_price">$85</div>
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
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
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
</body>

</html>