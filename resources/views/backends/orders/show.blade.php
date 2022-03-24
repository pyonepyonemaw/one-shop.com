@extends('master.master')

@section('content')

<div class="container-fluid bg-dark text-white p-5">
    <h2><i class="fa-solid fa-cart-shopping"></i> Orders</h2>

    
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ Session::get('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table mt-3 text-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
      @php $no=1; $total = 0; @endphp
      @foreach($orders as $order)
      @php 
      $total += $order['price'] * $order['qty'];
      @endphp
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$order['title']}}</td>
      <td>{{$order['description']}}</td>
      <td><img src='{{ asset("assets/products/$order[image]") }}' width="40" height="40" class="card-img-top" alt="..."></td>
      <td>{{$order['qty']}}</td>
      <td>{{$order['price']}} MMK</td>
      <td>{{$order['price'] * $order['qty']}} MMK</td>
      
    </tr>
    @php $no++; @endphp
    @endforeach

    <tfoot>
      <tr>
        <td colspan="6">Total</td>
        <td colspan="2">{{$total}} MMK</td>
        
      </tr>
    </tfoot>
    
  </tbody>
</table>

</div>


<div class="container-fluid bg-dark text-white">
  <h2 class="px-5">Customer's Information</h2>
  @if($errors->any())
    @foreach($errors->all() as $err)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $err }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
    @endif

    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ Session::get('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<form class="p-5" >
     

  <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" value="{{$customer->name}}" name="name" disabled>  
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" value="{{$customer->phone_number}}" name="phone" disabled>  
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" value="{{$customer->address}}" name="address" disabled>  
  </div>

  
  <a href="{{route('orders.index')}}" class="btn btn-outline-light"><i class="fa-solid fa-rotate-left"></i> To Customer Lists </a>
  
 
</form>
</div>

@endsection

