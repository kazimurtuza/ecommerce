@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
 

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>set company info</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

        <form action="{{route('updateCopanyinfo')}}" method="post">
          @csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> Company Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$data->company_name}}" name="company_name" placeholder="company_name">
                  @error('company_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>

                <input class="form-control" type="hidden" value="{{$data->phone_one}}" name="phone_one" placeholder="phone one">


             
            </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">phone one: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$data->phone_one}}" name="phone_one"placeholder="Enter phone one">
                  @error('phone_one')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
                </div><!-- col-6 -->
          
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">phone two: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" value="{{$data->phone_two}}" name="phone_two"placeholder="Enter phone two">
                  @error('phone_two')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
                </div><!-- col-6 -->

              
            
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">company_Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="company_Email" value="{{$data->company_Email}}" placeholder="company Email">
                  @error('company_Email')
                 <div class="alert alert-danger">{{ $message }}</div> 
                 @enderror
                </div>
              </div><!-- col-4 -->   
                  <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">company_address: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="company_address" value="{{$data->company_address}}" placeholder="company address">
                  @error('company_address')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 --> 
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">facebook_link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook_link" value="{{$data->facebook_link}}"placeholder="Ener facebook_link" >
                  @error('facebook_link')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">twitter_link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter_link" value="{{$data->twitter_link}}" placeholder="Ener twitter_link" >
                  @error('twitter_link')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">instagram_link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram_link" value="{{$data->instagram_link}} " placeholder="Ener instagram_link" >
                  @error('instagram_link')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                </div>
              </div><!-- col-4 -->   
              </div><!-- col-6 -->
              
          
               <button class="btn btn-info mg-r-5 ">update</button>
            

            </div>

              </div> 

            </div>

            <div class="form-layout-footer">
           
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