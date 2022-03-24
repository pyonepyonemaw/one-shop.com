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
          <a class="nav-link active text-white" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">PRODUCTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">CONTACT</a>
        </li>
         
      </ul>
      
    </div>
  </div>
</nav>
<!-- Start Banner -->
<section id="banner" >
    <div class="row"> 
        
        <div class="col-md-6 mt-5 p-4 text-center" data-aos="fade-left">
            <img src="{{ asset('assets/images/service one.png') }}" class="banner-image" alt="" width="300" height="300">
        </div>
        <div class="col-md-6 text-center pb-4" data-aos="fade-right">
            <h2 class="header-title">What We Do?</h2>
            <p class="header-para">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
            </p>
            <button class="header-btn">Learn More </button>
        </div>
    </div>
    <!-- <img src="{{ asset('assets/images/wave4.png')}}" class="w-100 img-fluid divider" alt=""> -->
</section>
<!-- End Banner -->

<!-- Start Service -->
<section id="service">
  <div class="container" id="service-box" >
    <h2 class="service-title text-center mt-3">Our Services</h2>
    <div class="row mt-5">
      @foreach($services as $service)
      <div class="col-md-4" data-aos="fade-up-right">
        <img src='{{ asset("assets/services/$service->image") }}' class="service-image" alt="">
        <h2 class="service-title">{{$service->title}}</h2>
        <p>{{$service->description}}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Service -->

<!-- Start App -->
<section id="app-box">
  <h2 class="text-center">Our App For You</h2>
  <div class="container">
    <div class="row">
    <div class="col-md-6 text-center p-5" data-aos="fade-up-right">
        <img src="{{ asset('assets/images/service three.png') }}" class="w-50" alt="" width="300" height="300">
      </div>
      <div class="col-md-6 text-center" data-aos="fade-up-left">
        <div class="app-body my-5">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <div class="group text-center">
          <button class="app-btn">iOS App</button>
          <button class="app-btn">Android App</button>
        </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- End App -->

<!-- Start Product -->
<section class="product">
  <div class="container mt-5">
    <h2 class="text-center product-title">Our Products</h2>
    <div class="row mt-5" >
      @foreach($products as $product)
      <!-- Start Card -->
      <div class="card col-md-3" data-aos="zoom-in" >
  <img src='{{ asset("assets/products/$product->image") }}' height="230" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-center">{{$product->title}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <div class="row">
      <p class="text-center">MMK {{$product->price}}
      <i class="fa-solid fa-cart-shopping"></i>
      <span class="badge rounded-pill bg-light text-dark">0</span>
      </p>
    </div>
    <div class="text-center">
    <a href="{{route('products.detail')}}" class="card-btn"><i class="fa-solid fa-cart-shopping"></i> View More</a>
    </div>
  </div>
</div>
@endforeach
      <!-- End Card -->

      

      

    </div>
  </div>
</section>
<!-- End Product -->

<!-- Start footer -->
<section id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 px-5" data-aos="zoom-in">
        <h2>CONTACT US</h2>
        <i class="fa-solid fa-location-dot"></i>
        <span>Yangon,Myanmar</span>
        <br><br>
        <i class="fa-solid fa-phone"></i>
        <span>+959123453214</span>
        <br><br>
        <i class="fa-solid fa-envelope"></i>
        <span>oneshop@gmail.com</span>
      </div>

      <div class="col-md-6 map" data-aos="zoom-in-up">
        <h2 class="px-5">Our Location</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.79018605314!2d95.90136320869036!3d16.839609806424058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2z4YCb4YCU4YC64YCA4YCv4YCU4YC6!5e0!3m2!1smy!2smm!4v1646376355601!5m2!1smy!2smm" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

    </div>
  </div>
  <p class="footer-bar">Design & Development by one-click programming</p>
</section>
<!-- End footer -->
@endsection