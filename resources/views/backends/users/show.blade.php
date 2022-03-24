@extends('layouts.app')

@section('content')

<div class="container bg-dark p-5">
<h2 class="text-center"><i class="fa-solid fa-user"></i> User Profile</h2>

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

</div>

@endsection