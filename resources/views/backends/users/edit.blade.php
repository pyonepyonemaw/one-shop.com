@extends('layouts.app')

@section('content')

<div class="container p-5 bg-dark">
    <h2 class="px-5"><i class="fa-solid fa-plus"></i> Edit User</h2>
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

    <form class="p-5" action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="text-center mt-5">
    <img src='{{ asset("assets/profile/$user->profile") }}'  alt="profile image" srcset="" width="150px" height="150px">
    </div>

  <div class="mb-3">
    <label for="name" class="form-label">User Name</label>
    <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name">  
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">  
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="********" name="password">  
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password" placeholder="********" name="password_confirmation">  
  </div>

  <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02" name="profile">
  <label class="input-group-text" for="inputGroupFile02">Upload Profile</label>
</div>
  
  
  <button type="submit" class="btn btn-outline-primary"> <i class="fa-solid fa-circle-check"></i> Update</button>
</form>
</div>

@endsection