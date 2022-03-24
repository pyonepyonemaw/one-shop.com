@extends('layouts.app')

@section('content')

<div class="container p-5 bg-dark">
    <h2 class="px-5"><i class="fa-solid fa-plus"></i> Edit Service</h2>
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

    <form class="p-5" action="{{ route('services.update',$service->id) }}" method="post" enctype="multipart/form-data">
      @csrf

  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" value="{{$service->title}}" name="title">  
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control">{{$service->description}}</textarea>
  </div>


  <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02" name="image">
  <label class="input-group-text" for="inputGroupFile02">Upload New Image</label>
</div>
  
  
  <button type="submit" class="btn btn-outline-primary"> <i class="fa-solid fa-circle-check"></i> Update</button>
</form>
</div>

@endsection