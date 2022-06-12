
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/managegame.css">
<div class="container justify-content-center mx-5">
    <a class='d-flex justify-content-end me-5 pe-5 text-decoration-none' href="/transaction"><button type="button"
            class="addgame btn text-white fw-bolder">Checkout</button></a>
    <div class="d-flex justify-content-center mt-4">
        <table class="table table-borderless table-hover mx-5 justify-content-center">
            <thead>
                <tr>
                    <th scope="col" style="color:gray">GAME TITLE</th>
                    <th scope="col" style="color:gray">GAME PRICE</th>
                    <th scope="col" style="color:gray">GAME QUANTITY</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d )

                <tr class='gamerow'>
                    <th scope="row">
                        <img class="mx-3" style="border-radius: 100%;width:40px;height: 40px;"
                            src=" {{ Illuminate\Support\Facades\Storage::url($d->getGame->image) }}">
                        {{ $d->getGame->title }}
                    </th>
                    <td>{{ $d->getGame->price }}</td>
                    <form action="/updatecart/{{ $d->id}}"method="POST">
                    @csrf
                    <td><input name="quantity"class="form-control" type="number"value="{{ $d->quantity }}"></td>
                    <td><button class="updatebtn btn btn-white" type="submit"style="color:#6610f2;">Update</button>
                    </td>
                    </form>
                    <td><a href="/deletecart/{{ $d->id}}" class="deletebtn btn btn-white text-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
