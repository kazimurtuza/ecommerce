@extends('admin.admin_layouts')

@section('admin_content')

@php
    $category=DB::table('post_categories')->get();
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>blogs post </h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">blogs post add</h6>

        <form action="{{url('update/blog/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
                   <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">post title (English):: <span class="tx-danger">*</span></label>
                <input type="text" class="form-control" name="english_title" value="{{$post->post_title_en}}" placeholder="english title">
                </div>
              </div><!-- col-4 -->
                   <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">post title (bangla):: <span class="tx-danger">*</span></label>
             <input type="text" class="form-control" name="bangla_title" value="{{$post->post_title_ba}}" placeholder="bangla title">
                </div>
              </div>
            
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">category: <span class="tx-danger">*</span></label> 
                  <select name="category" id="" class=" form-control">
                      <option value="">select category</option>
                      @foreach ($category as $item)
                  <option value="{{$item->id}}" @if ($item->id==$post->category_id)
                     selected
                  @endif>{{$item->category_name_en}} </option>
                      @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

            <div class=" col-lg-12">
              <div class="mg-t-10 mg-b-10">
         
          {{-- <div id="summernote">Hello, universe!</div> --}}
          <label class="form-control-label">english post: <span class="tx-danger">*</span></label>
          <textarea name="english_post" id="summernote" cols="30" rows="10" >{!!$post->details_en !!}</textarea>

            </div><!-- card -->

            </div>
            
            <div class=" col-lg-12">
              <div class="mg-t-10 mg-b-10">
         <label class="form-control-label">bangla post: <span class="tx-danger">*</span></label>
          {{-- <div id="summernote">Hello, universe!</div> --}}
          <textarea name="bangla_post" id="summernote1" cols="30" rows="10">{!!$post->details_ba !!}</textarea>

            </div><!-- card -->

            </div>
           
            

              <div class="col-lg-10">
                   <br> <br>
              	<lebel>Image One (Main Thumbnail)<span class="tx-danger">*</span></lebel>
              	<label class="custom-file">
      				  <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);"  accept="image">
                        <span class="custom-file-control"></span>
                      </label>
                       <img  src="#" id="one" >
                       @if ($post->post_image)
                            <img style=" float: right;" src="{{url($post->post_image)}}" height="70" width="100" title="old pic" alt="">
                            @else
                            <span> no image found</span>
                       @endif
                   
                    <input type="hidden" name="old_image" value="{{$post->post_image}}">
              </div>
              
            </div><!-- row -->
            <br> <hr>
            

           

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


</script>
    
@endsection