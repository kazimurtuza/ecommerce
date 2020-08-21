@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Add</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add user</h6>

        <form action="{{route('updateuser')}}" method="post">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$user->name}}" name="name" placeholder="Enter Product Name">
                  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>

                <input class="form-control" type="hidden" value="{{$user->id}}" name="id" placeholder="Enter Product Name">
             
            </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">phone: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$user->phone}}" name="phone"placeholder="Enter phone">
                  @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder="Enter email">
                  @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="password" placeholder="Ener password" >
                  @error('password')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              
          
            
            


             
            </div><!-- row -->
                  
            <br><h6> user role</h6> <hr>
            
   
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="category" value="1" <?php if($user->category==1){ echo"checked";} ?> >
					  <span>category</span>
					</label>
            	</div>
           
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="return_order" value="1" <?php if($user->return_order==1){ echo"checked";} ?> >
					  <span>return_order</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="coupon" value="1" <?php if($user->coupon==1){ echo"checked";} ?> >
					  <span>coupon</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="other" value="1" <?php if($user->other==1){ echo"checked";} ?> >
					  <span>other</span>
					</label>
                </div>

                 	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="order" value="1" <?php if($user->order==1){ echo"checked";} ?> > 
					  <span>order</span>
					</label>
            	</div>
                

            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="product" value="1" <?php if($user->product==1){ echo"checked";} ?> >
					  <span>product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="blog" value="1" <?php if($user->blog==1){ echo"checked";} ?> >
					  <span>blog</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="report" value="1" <?php if($user->report==1){ echo"checked";} ?> > 
					  <span>report</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="user_role" value="1" <?php if($user->user_role==1){ echo"checked";} ?> >
      					  <span>user role</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="contact" value="1" <?php if($user->contact==1){ echo"checked";} ?> >
      					  <span>contact</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="product_comment" value="1" <?php if($user->product_comment==1){ echo"checked";} ?> >
      					  <span>product_comment</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="setting" value="1" <?php if($user->setting==1){ echo"checked";} ?> >
      					  <span>setting</span>
      					</label>
            	</div>
{{-- 
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="buyone_getone" value="1">
                  <span>Buy One Get One</span>
                </label>
              </div> --}}

            </div>

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">update</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

    </form>








        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>



    
@endsection