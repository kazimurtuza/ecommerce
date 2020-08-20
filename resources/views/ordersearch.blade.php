 @extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}"> 
	<div class="cart">
                        
        
	<div class="cart_section">
		<div class="container">
            <h2 class=" text-center "> search orders</h2>
            <div class="row bg-info p-5 align-content justify-content-center" >
                <div class=" col-3 m-2 p-5 " style="  background:rgb(225, 233, 226)">
                    <form action="{{route('SrcOrderDatewise')}}" method="POST" >
                        @csrf
                    <div class=" form-group">
                        <label for="">date</label>
                        <input type="date" name="date" class=" form-control" id="">
                    </div>
                            <input type="submit" class=" form-control  bg-info text-white" value="search" >
                    </form>
                </div>
                <div class=" col-3 m-2 p-5 "  style="  background:rgb(225, 233, 226)">
                
                <form action="{{route('SrcOrderMonthwise')}}" method="POST" >
                      @csrf
                        <div class=" form-group">
                      <label for="">Month</label>
                        <select name="month" id="" class=" form-control">
                       
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                            <option value="Months">Months</option>
                        </select>
                    </div>
                     <input type="submit" class=" form-control ml-2 bg-info text-white" value="search" >
                     </form>
                </div>
                <div class=" col-3 m-2  p-5" style="  background:rgb(225, 233, 226)">
                       <form action="{{route('SrcOrderYearwise')}}" method="POST" >
                        @csrf
                        <div class=" form-group">
                        <label for="">year</label>
                         <input type="number" class=" form-control" value="2020" name="year" id="">
                    </div>

                    <input type="submit" class=" form-control  bg-info text-white" value="search" >
                    </form>
                </div>
            </div>
    
		 

         </div>
		</div>
	</div>

<script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection