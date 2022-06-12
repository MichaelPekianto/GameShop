@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/managegame.css') }}">
<div class="container d-flex flex-column justify-content-center mb-4 mx-auto">
<a class='d-flex justify-content-end me-5 pe-5 text-decoration-none' href="/insert"><button type="button"class="addgame btn text-white fw-bolder" >Add Game</button></a>
<div class="d-flex justify-content-center mt-4">
<table class="gamerow table table-borderless table-hover mx-5 justify-content-center">
<thead>
    <tr>
        <th scope="col"style="color:gray">GAME TITLE</th>
        <th scope="col"style="color:gray">PEGI RATING</th>
        <th scope="col"style="color:gray">GAME GENRE</th>
        <th scope="col"style="color:gray">GAME PRICE</th>
    </tr>
</thead>
<tbody>
    @foreach ( $data as $d )

    <tr class='gamerow'>
        <th scope="row" >
        <img class="mx-3"style="border-radius: 100%;width:40px;height: 40px;"src=" {{ Illuminate\Support\Facades\Storage::url($d->image) }}">
        {{ $d->title }}</th>
        <td>{{ $d->PEGI_rating }}</td>
        <td><span
                class="position-absolute center badge rounded-pill"
                style="color:green;background-color: #b2f7d3;">
                {{ $d->getGenre->genre }}</span></td>
        <td>{{ $d->price }}</td>
        <td><a href="/update/{{ $d->id}}" class="updatebtn btn btn-white"style="color:#6610f2;">Update</a></td>
        <td><a href="/delete/{{ $d->id}}" class="deletebtn btn btn-white text-danger">Delete</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
