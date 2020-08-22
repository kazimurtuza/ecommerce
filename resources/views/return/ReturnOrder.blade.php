
@extends('layouts.app')
@section('content')
{{-- @php 
  $order=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp --}}

    <div class="contact_form">
        <div class="container">
            <div class="row">
               <div class="col-8 card">
                 <table class="table table-response">
                   <thead>
                     <tr>
                       <th scope="col">PaymentType</th>
                       <th scope="col">Return position</th>
                       <th scope="col">Amount</th>
                       <th scope="col">Date</th>
                        <th scope="col">Status Code</th>
                        <th scope="col">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     @php
                         $order=DB::table('orders')->where('user_id',Auth::user()->id)->where('statuse',3)->orderBy('id','DESC')->get();
                     @endphp
                    @foreach($order as $row)
                     <tr>
                     <th >{{$row->pay_type}}</th>
                       <th>
                           @if($row->returnorder==0)
                            <p class=" badge badge-info">request is available</p>
                           @else
                           @endif
                           @if($row->returnorder==1)
                           <p class=" badge badge-info">pending</p>
                           @else
                           @endif
                           @if($row->returnorder==2)
                           <p class=" badge badge-success">return request accepded</p>
                           @else
                           @endif
                     
                    
                    </th>
                       <td>{{$row->paying_amount}}</td>
                       <td>{{$row->date}}</td>
                       <td>{{$row->statuse_code}}</td>
                       <td>
                                 @if($row->returnorder==0)
                              <a href="{{url('user/return/'.$row->id)}}" class="btn btn-sm btn-info">Return</a>
                          @else
                                  <p class=" badge badge-success">return request send successfully</p>
                                 
                          @endif
                    
                     
                       </td>
                     </tr>
                    @endforeach
                   </tbody>
                 </table>
               </div>
               <div class="col-4">
                 <div class="card" style="width: 18rem;">
                  <img src="" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" >
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href=""> Password Change </a></li>
                    <li class="list-group-item"><a href=""> Edit Profile </a></li>
                  <li class="list-group-item"><a href="{{route('ReturnOrder')}}"> Return Order </a></li>
                  </ul>
                  <div class="card-body">
                  <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                  </div>
                </div>
               </div>
            </div>
        </div>
    </div>

@endsection

