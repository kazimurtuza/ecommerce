@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Update</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product info</h6>

        <form action="{{url('update/product/'.$details->id)}}"  method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{$details->product_name}}" name="product_name" placeholder="Enter Product Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">product code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{$details->product_code}}" name="product_code"placeholder="Enter product code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{$details->product_quantity}}" name="product_quantity" placeholder="Enter Quantity">
                </div>
              </div><!-- col-4 -->   
              
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose category" id="category">
                    <option label="Choose category"></option>
                        @foreach ($data as $row)
                  <option value="{{$row->category_id}}" @if ($details->category_id==$row->category_id)
                      selected
                  @endif>{{$row->category_name}}</option>
                    @endforeach
                 
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose subcategory" name=" subcategory_id" id="subcategory">
                  <option value="{{$details->subcategory_id}}">{{$details->subcategory_name}}</option>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id" >
                    <option label="Choose brand"></option>
                    
                        @foreach ($brand as $row)
                  <option value="{{$row->id}}" @if ($details->brand_id==$row->id)
                      selected
                  @endif>{{$row->brand_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

                  
             
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">products colout: <span class="tx-danger">*</span></label><br>
                  <input class="form-control " value="{{$details->product_colour}}"   type="text" name="product_colour" id="" data-role="tagsinput" style="" placeholder="Enter product color">
              
              </div>
              </div><!-- col-4 -->
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control "   type="text" value="{{$details->product_size}}" name="product_size" id="" data-role="tagsinput" style="" placeholder="Enter product size">
              
              </div>
              </div><!-- col-4 -->

              <!-- col-4 -->

                    <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_price" value="{{$details->selling_price}}" placeholder="Enter Product price">
                </div>
              </div><!-- col-4 -->
            
            
            <div class=" col-lg-12">
              <div class="mg-t-10 mg-b-10">
         
          {{-- <div id="summernote">Hello, universe!</div> --}}
              <textarea name="product_details" id="summernote" cols="30" rows="10">{{$details->product_details}}</textarea>

          <div class="mg-t-10 ">
            <div class=" form-group">
                 <label class="form-control-label"> Video link
            <span class="tx-danger">*</span>
          </label>
            <input  class="form-control" placeholder="Video link" value="{{$details->video_link}}" name="video_link">
            </div>
          </div>
            </div><!-- card -->

            </div>

            
              
            </div><!-- row -->
            <br> <hr>
            

            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="main_slider" value="1"@if ($details->main_slider==1)
                          checked
                      @endif>
					  <span>Main Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="hot_deal" value="1" @if ($details->hot_deal)
                           checked 
                      @endif>
					  <span>Hot Deal</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="best_rated" value="1"@if ($details->best_rated)
                           checked 
                      @endif>
					  <span>Best Rated</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="trend" value="1"@if ($details->trend)
                           checked 
                      @endif>
					  <span>Trend Product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="mid_slider" value="1" @if ($details->mid_slider)
                           checked 
                      @endif> 
					  <span>Mid Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="hot_new" value="1" @if ($details->hot_new)
                           checked 
                      @endif> 
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


</form>


               <br> <br> <hr><hr> <h6>Image update</h6>
  <form action="" method="post" class=" bg-success-light  p-5" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-10">
              	<lebel>Image One <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				  
              </label>
              <img style="margin-left:20px" src="" id="one" >
            <img src="{{url($details->image_one)}}" style=" float:right;" id=""  height="70" width="100">
               <label for="" class=" bg-light p-2"  style="float:right;border-radius:20px" >old</label>
              </div>
              <br><br><hr>

               <div class="col-lg-10">
              	<lebel>Image two <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
              </label>
            <img style="margin-left:20px" src="" id="two" >
            <img src="{{url($details->image_two)}}" style=" float:right;" id=""  height="70" width="100">
               <label for="" class=" bg-light p-2"  style="float:right;border-radius:20px" >old</label>
              </div>
              
                <br><br><hr>
              <div class="col-lg-10">
              	<lebel>Image Three <span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file"class="custom-file-input" name="image_three" onchange="readURL3(this);" required="" accept="image">
      				  <span class="custom-file-control"></span>
      				 
              </label>
                  <img style="margin-left:20px" src="" id="three" >
            <img src="{{url($details->image_three)}}" style=" float:right;" id=""  height="70" width="100">
               <label for="" class=" bg-light p-2"  style="float:right;border-radius:20px" >old</label>
              </div>
              <br><br><hr>
              <button class="btn btn-warning mg-r-5">Add product</button>

              </form>


              <br><br>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->




 
           </div>

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