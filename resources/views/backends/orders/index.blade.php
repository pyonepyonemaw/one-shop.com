@extends('layouts.app')

@section('content')

<div class="container bg-dark p-5">
    <h2><i class="fa-solid fa-bars-staggered"></i> Customers List</h2>
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ Session::get('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php $no=1; @endphp
      @foreach($customers as $customer)
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$customer->name}}</td>
      <td>{{$customer->phone_number}}</td>
      <td>{{$customer->address}}</td>
      <td><a href="{{route('orders.show',$customer->id)}}" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i> </a>
      <a href="{{route('orders.delete',$customer->id)}}" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i> </a>
    </td>
    </tr>
    @php $no++; @endphp
    @endforeach
    
  </tbody>
</table>

</div>

@endsection

