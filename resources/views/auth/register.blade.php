@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">
<div class="container">
    <div class="row">
        <div class=" col-lg-5 offset-lg-1 p-4" style=" border:solid 2px rgb(158, 156, 156)">
            <div class="contact_form_container">
						<div class="contact_form_title">Sign Up</div>

            <form action="{{route('login')}}" method="post" id="contact_form">
						@csrf
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Email or phone</label>
                                         <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                 </div>
                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">password</label>
                                         <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                           @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
							
						
							<div class="contact_form_button">
								<button type="submit" class="btn btn-info">login</button>
							</div>
                        </form><br>
                    <a href="{{route('password.request')}}">forgot my password</a>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block"> Login with faceBook</button><br> 
                        <a href="{{ url('/auth/redirect/google') }}" type="submit" class="btn btn-danger btn-block"> Login with Email</a>

                        <a href=""></a>

                    </div>

        </div>
        <div class=" col-lg-5 offset-lg-1 p-4" style=" border:solid 2px rgb(158, 156, 156)">
               <div class="contact_form_container">
						<div class="contact_form_title">Sign Up</div>

               <form action="{{route('register')}}" method="post" id="contact_form">
						@csrf
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Name</label>
                                         <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="full name" required>
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Email</label>
                                         <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Phone</label>
                                         <input type="text"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="phone number">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">password</label>
                                         <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="password" required>
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1" >Confirm Password</label>
                                         <input type="password" class="form-control" id="exampleFormControlInput1" name="password_confirmation"  placeholder="Re-type password" required>
                                 </div>
							
						
							<div class="contact_form_button">
								<button type="submit" class="btn btn-info">login</button>
							</div>
						</form>

                    </div>
        </div>

    </div>

     		
                    </div>
@endsection
