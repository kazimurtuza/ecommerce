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

        <form action="{{route('insertuser')}}" method="post">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" placeholder="Enter Product Name">
                  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"placeholder="Enter phone">
                  @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email" placeholder="Enter email">
                  @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="password" placeholder="Ener password" required>
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
					  <input type="checkbox" name="category" value="1">
					  <span>category</span>
					</label>
            	</div>
           
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="return_order" value="1">
					  <span>return_order</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="coupon" value="1">
					  <span>coupon</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="other" value="1">
					  <span>other</span>
					</label>
                </div>

                 	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="order" value="1"> 
					  <span>order</span>
					</label>
            	</div>
                

            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="product" value="1">
					  <span>product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="blog" value="1">
					  <span>blog</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="report" value="1"> 
					  <span>report</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="user_role" value="1">
      					  <span>user role</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="contact" value="1">
      					  <span>contact</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="product_comment" value="1">
      					  <span>product_comment</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="setting" value="1">
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
              <button class="btn btn-info mg-r-5">Add product</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

    </form>








        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>



{{-- <script>
  $('#category').change(function(){
    $value=$(this).val();
   
    $.get("{{route('subcategorylistshow')}}",{id:$value},function(data){

      $('#subcategory').empty().html(data);
    })

  })

function readURL(input){
    var reader=new FileReader();
    reader.onload=function(e){
      $('#one')
      .attr('src',e.target.result)
      .height(80)
      .width(80);
    };
    reader.readAsDataURL(input.files[0]);
  }

function readURL2(input){
    var reader=new FileReader();
    reader.onload=function(e){
      $('#two')
      .attr('src',e.target.result)
      .height(80)
      .width(80);
    };
    reader.readAsDataURL(input.files[0]);
  }
function readURL3(input){
    var reader=new FileReader();
    reader.onload=function(e){
      $('#three')
      .attr('src',e.target.result)
      .height(80)
      .width(80);
    };
    reader.readAsDataURL(input.files[0]);
  }
</script> --}}
    
@endsection