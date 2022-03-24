@extends('layouts.app')

@section('content')

<div class="container bg-dark p-5">
    <h2><i class="fa-solid fa-bars-staggered"></i> Services List</h2>
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
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">ImageName</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php $no=1; @endphp
      @foreach($services as $service)
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{$service->title}}</td>
      <td>{{$service->description}}</td>
      <td>{{$service->image}}</td>
      <td><a href="{{ route('services.edit',$service->id)}}" class="btn btn-outline-success"><i class="fa-solid fa-pen"></i> </a>
      <a href="{{route('services.delete',$service->id)}}" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i> </a>
    </td>
    </tr>
    @php $no++; @endphp
    @endforeach
    
  </tbody>
</table>

</div>

@endsection

