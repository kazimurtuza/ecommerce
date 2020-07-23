@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">
<div class="container">
    <div class="row">
        <div class=" col-lg-5 offset-lg-1 p-4" style=" border:solid 2px rgb(158, 156, 156)">
            <div class="contact_form_container">
						<div class="contact_form_title">Sign Up</div>

						<form action="#" id="contact_form">
						
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Email or phone</label>
                                         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">password</label>
                                         <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                 </div>
							
						
							<div class="contact_form_button">
								<button type="submit" class="btn btn-info">login</button>
							</div>
                        </form>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block"> Login with faceBook</button><br> 
                        <button type="submit" class="btn btn-danger btn-block"> Login with Email</button>

                    </div>

        </div>
        <div class=" col-lg-5 offset-lg-1 p-4" style=" border:solid 2px rgb(158, 156, 156)">
               <div class="contact_form_container">
						<div class="contact_form_title">Sign Up</div>

						<form action="#" id="contact_form">
						
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Email</label>
                                         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Phone</label>
                                         <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="phone ">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">password</label>
                                         <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
                                 </div>
								 <div class="form-group">
                                         <label for="exampleFormControlInput1">Confirm Password</label>
                                         <input type="password" class="form-control" id="exampleFormControlInput1" 
                                         placeholder="Re-type password">
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
