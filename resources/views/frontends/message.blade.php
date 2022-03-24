@extends('master.master')


@section('content')

<div class="container mt-5 text-white" >
    <div class="alert alert-success" data-aos="zoom-in-up">Congratulation! Your Order Confirmed! 
        <a href="{{route('products.detail')}}" class="btn btn-outline-dark"> <i class="fa-solid fa-rotate-right"></i> Home</a>
    </div>
</div>

@endsection