 @extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product details</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product info</h6>

    

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <strong>{{$details->product_name}}</strong>
           
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">product code: <span class="tx-danger">*</span></label>
                 <strong>{{$details->product_code}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                 <strong>{{$details->product_quantity}}</strong>
                </div>
              </div><!-- col-4 -->   
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">discount_price: <span class="tx-danger">*</span></label>
                <strong>{{$details->discount_price}}</strong>
                </div>
              </div><!-- col-4 --> 
              
           
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <strong>{{$details->category_name}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">subcategory: <span class="tx-danger">*</span></label>
                <strong>{{$details->subcategory_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
               <strong>{{$details->brand_name}}</strong>
                </div>
              </div><!-- col-4 -->

                  
             
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">product colour: <span class="tx-danger">*</span></label><br>
                  <strong>{{$details->product_colour}}</strong>
              
              </div>
              </div><!-- col-4 -->
       <div class="col-lg-4">
          <div class=" form-group">
                
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                <strong>{{$details->product_size}}</strong>
              
              </div>
              </div><!-- col-4 -->

              <!-- col-4 -->

                    <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Selling Price: <span class="tx-danger">*</span></label>
                <strong>{{$details->selling_price}} tk</strong>
                </div>
              </div><!-- col-4 -->
            
            
            <div class=" col-lg-12">
                <label class="form-control-label"> details: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-b-10" style=" border:solid 2px rgb(195, 191, 191);padding:5px">
         
          {{-- <div id="summernote">Hello, universe!</div> --}}
          {{-- <textarea name="product_details" id="summernote" cols="30" rows="10"></textarea> --}}
             <div class="form-group">
                  
              <p>{!! $details->product_details !!}</p>
                </div>
        

            </div><!-- card -->

            </div><br>

              <div class="col-lg-4">
              	<lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel><br><br>
              	<label class="custom-file">
      				
                  <img src="{{url($details->image_one)}}" height="70px" width="100px" id="one" >
      				</label>
              </div>
              <div class="col-lg-4">
              	<lebel>Image two<span class="tx-danger">*</span></lebel><br><br>
              	<label class="custom-file">
      				
                  <img src="{{url($details->image_two)}}" height="70px" width="100px" id="two" >
      				</label>
              </div>
              <div class="col-lg-4">
              	<lebel>Image Three<span class="tx-danger">*</span></lebel> <br><br>
              	<label class="custom-file">
      				
                  <img src="{{url($details->image_three)}}" height="70px" width="100px" id="three" >
      				</label>
              </div>
            </div><!-- row -->
            <br> <hr>
            

            <div class="row">
            	<div class="col-lg-4">
            		<label >
                        @if ($details->main_slider==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
					  
					  <span>Main Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
                               @if ($details->hot_deal==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
					
					  <span>Hot Deal</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
                        @if ($details->best_rated==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
                        
				
					  <span>Best Rated</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
					@if ($details->trend==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
					  <span>Trend Product</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
					  @if ($details->mid_slider==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
					  <span>Mid Slider</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
      					  @if ($details->hot_new==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
      					  <span>Hot New</span>
      					</label>
            	</div>
            	<div class="col-lg-4">
            		<label >
      					  @if ($details->buyone_getone==1)
                    <span class=" badge btn-primary">active</span>
                    @else
                    <span class=" badge btn-danger">inactive</span>

                        @endif
      					  <span>buyone_getone</span>
      					</label>
            	</div>


            </div>

          
          </div><!-- form-layout -->
        </div><!-- card -->


        </div><!-- sl-pagebody -->
  
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

 
    
@endsection