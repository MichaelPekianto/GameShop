
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>{{$data->title}}</title>
</head>

<body>
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<div class="bg container-fluid d-flex flex-column justify-content-center py-5">

<h1 class="text-white fw-bolder text-center ">{{ $data->title }}</h1>
<div class="background container rounded-3 mt-4 mx-auto">
    <div class="row justify-content-between align-items-center my-4 mx-4">
    <div class="col text-color-success "><span
            class="badge rounded-pill"
            style="color:green;background-color: #b2f7d3;">
            {{ $data->getGenre->genre }}</span></div>
            <div class="col col-md-auto ">
                @switch($data->PEGI_rating)
                    @case('18')
                    <img src="{{ asset('image/PEGI_18.svg') }}" style="width:45px;height:45px;"alt="">
                        @break
                    @case('16')
                    <img src="{{ asset('image/PEGI_16.svg') }}" style="width:45px;height:45px;" alt="">
                        @break
                    @case('12')
                    <img src="{{ asset('image/PEGI_12.svg') }}" style="width:45px;height:45px;" alt="">
                    @break
                    @case('7')
                    <img src="{{ asset('image/PEGI_7.svg') }}" style="width:45px;height:45px;" alt="">
                    @break
                    @case('3')
                    <img src="{{ asset('image/PEGI_3.svg') }}" style="width:45px;height:45px;" alt="">
                    @break
                    @case('0')
                    <img src="{{ asset('image/PEGI_PARENTAL.svg') }}" style="width:45px;height:45px;" alt="">
                    @break
                @endswitch
                {{-- <h4 class='txt fs-3 fw-bolder bg-danger mb-2 '>{{ $data->PEGI_rating }}</h4> --}}
            </div>
            <div class="col col-md-auto ">
            @if ($data->price=='0')
            <h2 class="txt fw-bolder">{{ 'Free' }}</h4>
            @else
            <h2 class="txt fw-bolder ">${{ $data->price }}</h4>
            @endif
                </div>
        </div>
        <div class="row justify-content-between align-items-start my-4 pb-4 mx-4">
        <div class="col">
        <p class="desc txt text-left text-wrap">{{ $data->desc }}</p>
    </div>
        <div class="col col-md-auto">
        @if (auth()->check()!=false)
        <form action="/cart/{{ $data->id }}" method="POST">
            @csrf
            <button type="submit"class="btn btn-primary form-control">Add to Cart</button>
        </form>
        @else
        <form action="/login" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
        @endif
        </div>
        </div>
</div>
</div>

@endsection
</body>

</html>
