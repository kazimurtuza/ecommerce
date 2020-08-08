 @extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Technological Blog</h2>
		</div>
	</div>
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
                @foreach ($post as $item)
                    <!-- Blog post -->
                    @if (Session::get('language')=='bangla')
                    	<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset($item->post_image)}})"></div>
                        <div class="blog_text">{{$item->post_title_ba}}</div>
							<div class="blog_button"><a href="blog_single.html">বিস্তারিত দেখুন</a></div>
                        </div>
                        @else
                        	<div class="blog_post">
							<div class="blog_image" style="background-image:url({{asset($item->post_image)}})"></div>
							<div class="blog_text">{{$item->post_title_en}}</div>
							<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
						</div>
                        
                    @endif
					
                    
                @endforeach

					
						
					</div>
				</div>
					
			</div>
		</div>
	</div>
    
@endsection