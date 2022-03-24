@extends('master.master')

@section('title',"Home Page")

@section('content')
<nav class="navbar navbar-expand-lg navbar-light text-white" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Shopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto ">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">PRODUCTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('carts.index')}}">
          <i class="fa-solid fa-cart-shopping"></i>
          <span class="badge rounded-pill bg-light text-dark">
            @if(session()->has('count'))
             {{session()->get('count')}}
            @else
            0
            
            @endif
          </span>
          </a>
        </li>
         
      </ul>
      
    </div>
  </div>
</nav>





<!-- Start Product -->
<section class="product">
  <div class="container " >
    <h2 class="text-center product-title">Our Products</h2>
    <div class="row mt-5">
      @foreach($products as $product)
      <!-- Start Card -->
      <div class="card col-md-3" data-aos="zoom-in-up">
  <img src='{{ asset("assets/products/$product->image") }}' height="230" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-center">{{$product->title}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <div class="row">
      <p class="text-center">MMK {{$product->price}}
      <i class="fa-solid fa-cart-shopping"></i>
      
      </p>
    </div>
    <div class="text-center">
    <a href="{{route('carts.create',$product->id)}}" class="card-btn"><i class="fa-solid fa-cart-shopping"></i> Add To Cart</a>
    </div>
  </div>
</div>
@endforeach
      <!-- End Card -->     
    </div>{{$products->links()}}
  </div>
</section>
<!-- End Product -->

<!-- Start footer -->
<section id="footer-box">
  <p class="footer-text">Design & Development by one-click programming</p>
</section>
<!-- End footer -->
@endsection