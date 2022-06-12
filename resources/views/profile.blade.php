<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/profile.css')  }}">


</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="fw-bold mb-5">Profile</h2>

<form action="/updateprofile" method="post"enctype="multipart/form-data">
    @csrf
    <div class="row mb-5"style="color:gray;">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" value="{{  $data->name }}"class="form-control @error('name') is-invalid @enderror" id="name" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-5"style="color:gray;">
        <label for="inputPhoto" class="col-6 col-sm-2 col-form-label">Photo</label>
        @if(Auth::user()->image!=null)
        <img id="profile-image"class='col-6 col-sm-1 rounded-circle' src=" {{ Illuminate\Support\Facades\Storage::url($data->image) }}"style="width:75px;height: 50px;">
        @else
        <img id="profile-image"class="col-6 col-sm-1" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" style="width:75px;height: 50px;">
        @endif
        <div class="col-6 col-sm-5"></div>
        <div class="col-6 col-sm-4">
            <input name="photo" type="file" style='color:#6610f2;'class="form-control @error('photo') is-invalid @enderror"
                id="photo">
            @error('photo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-5"style="color:gray;">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input name="email" type="email" value="{{ $data->email }}"class="form-control @error('email') is-invalid @enderror"
                id="email">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

    </div>
    <div class="row mb-5"style="color:gray;">
        <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
            <select name="gender" id="inputGender" class="form-select">
                <option selected>{{ $data->gender }}</option>
                @if ($data->gender=="Male")

                <option>Female</option>
                @else

                <option>Male</option>
                @endif
            </select>
        </div>
    </div>
    <div class="row mb-5" style="color:gray;">
        <label for="inputEmail" class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-10">
            <input name="date" type="date" value="{{ $data->DOB }}"
                class="form-control @error('date') is-invalid @enderror" id="date">
            @error('date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

    </div>
    <div class="position-relative">
    <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary"style="background-color:#6610f2;">Update</button></div>


</form>
@isset($messageprofile)
<div class="alert alert-success">
    <strong>{{$messageprofile}}</strong>
</div>
@endif
<h2 class="fw-bold mt-5 mb-5">Account</h2>
<form action="/updatepassword" method="post">
    @csrf
    <div class="row mb-5" style="color:gray;">
        <label for="inputoldpassword" class="col-sm-2 col-form-label">Old password</label>
        <div class="col-sm-10">
            <input name="oldpassword" type="password"
                class="form-control @error('oldpassword') is-invalid @enderror" id="oldpassword" autofocus>
            @error('oldpassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-5" style="color:gray;">
        <label for="inputnewpassword" class="col-sm-2 col-form-label">New password</label>
        <div class="col-sm-10">
            <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror"
                id="newpassword" autofocus>
            @error('newpassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-5" style="color:gray;">
        <label for="inputconfirmpassword" class="col-sm-2 col-form-label">Confirm New password</label>
        <div class="col-sm-10">
            <input name="confirmpassword" type="password" class="form-control @error('confirmpassword') is-invalid @enderror"
                id="confirmpassword" autofocus>
            @error('confirmpassword')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="position-relative">
        <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary"
            style="background-color:#6610f2;">Update</button>
    </div>
</form>
@isset($message)
<div class="alert alert-success">
    <strong>{{$message}}</strong>
</div>
@endif
</div>
@endsection
</body>
</html>

