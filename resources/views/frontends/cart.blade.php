@extends('master.master')

@section('content')

<div class="container-fluid bg-dark text-white p-5">
    <h2><i class="fa-solid fa-cart-shopping"></i> Your Carts</h2>
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ Session::get('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table mt-3 text-white" data-aos="zoom-in-up">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php $no=1; $total = 0; @endphp
      @foreach($carts as $key=>$cart)
      @php 
      $total += $cart['price'] * $cart['qty'];
      @endphp
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$cart['title']}}</td>
      <td>{{$cart['description']}}</td>
      <td><img src='{{ asset("assets/products/$cart[image]") }}' width="40" height="40" class="card-img-top" alt="..."></td>
      <td>{{$cart['qty']}}</td>
      <td>{{$cart['price']}} MMK</td>
      <td>{{$cart['price'] * $cart['qty']}} MMK</td>
      <td>
          <a href="{{route('carts.add',$key)}}" class="btn btn-outline-light"><i class="fa-solid fa-circle-plus "></i></a>
          <a href="{{route('carts.subtract',$key)}}" class="btn btn-outline-light"><i class="fa-solid fa-circle-minus"></i></a>
          <a href="{{route('carts.delete',$key)}}" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
      </td>
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
  <h2 class="px-5">Fill User Information</h2>
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
<form class="p-5" action="{{ route('carts.checkout') }}" method="post" data-aos="zoom-in-up">
      @csrf

  <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">  
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone Number" name="phone">  
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address">  
  </div>

  
  
  
  <button type="submit" class="btn btn-outline-info"> <i class="fa-solid fa-circle-check"></i> Check Out</button>
</form>
</div>

@endsection

