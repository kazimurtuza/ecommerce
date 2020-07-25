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
          <h6 class="card-body-title">Product info</h6>

        <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">product code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code"placeholder="Enter product code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" placeholder="Enter Quantity">
                </div>
              </div><!-- col-4 -->   
              
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose category" id="category">
                    <option label="Choose category"></option>
                        @foreach ($category as $row)
                  <option value="{{$row->id}}">{{$row->category_name}}</option>
                    @endforeach
                 
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose subcategory" name=" subcategory_id" id="subcategory">
                    <option label="Choose subcategory"></option>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id" >
                    <option label="Choose brand"></option>
                    @foreach ($brand as $row)
                  <option value="{{$row->id}}"> {{$row->brand_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

                  
             
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">storeproduct: <span class="tx-danger">*</span></label><br>
                  <input class="form-control "   type="text" name="product_colour" id="" data-role="tagsinput" style="" placeholder="Enter product color">
              
              </div>
              </div><!-- col-4 -->
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control "   type="text" name="product_size" id="" data-role="tagsinput" style="" placeholder="Enter product size">
              
              </div>
              </div><!-- col-4 -->

              <!-- col-4 -->

                    <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_price" value="" placeholder="Enter Product price">
                </div>
              </div><!-- col-4 -->
            
            
            <div class=" col-lg-12">
              <div class="mg-t-10 mg-b-10">
         
          {{-- <div id="summernote">Hello, universe!</div> --}}
          <textarea name="product_details" id="summernote" cols="30" rows="10"></textarea>

          <div class="mg-t-10 ">
            <div class=" form-group">
                 <label class="form-control-label"> Video link
            <span class="tx-danger">*</span>
          </label>
            <input  class="form-control" placeholder="Video link" name="video_link">
            </div>
          </div>
            </div><!-- card -->

            </div>

              <div class="col-lg-4">
              	<lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="one" >
      				</label>
              </div>

               <div class="col-lg-4">
              	<lebel>Image two <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="two" >
      				</label>
              </div>
              <div class="col-lg-4">
              	<lebel>Image Three <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file"class="custom-file-input" name="image_three" onchange="readURL3(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  <img src="#" id="three" >
      				</label>
              </div>
              
            </div><!-- row -->
            <br> <hr>
            

            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="main_slider" value="1">
					  <span>Main Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="buyone_getone" value="1">
					  <span>buyone_getone</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="hot_deal" value="1">
					  <span>Hot Deal</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="best_rated" value="1">
					  <span>Best Rated</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="trend" value="1">
					  <span>Trend Product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="mid_slider" value="1"> 
					  <span>Mid Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="hot_new" value="1">
      					  <span>Hot New</span>
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
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
</form>

        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>



<script>
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
</script>
    
@endsection