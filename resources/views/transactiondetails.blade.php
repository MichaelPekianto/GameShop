@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/managegame.css') }}">
<div class="container justify-content-center mb-4 mx-auto">
    <div class="d-flex justify-content-between">
        <div class=" ">
    <h4>Transaction ID : {{ $data2->id }}</h4>
    <h4>Customer: {{ $data2->getUser->name }}</h4>
        </div>
    <h4>Transaction Date: {{ $data2->created_at }}</h4>
    </div>
    <div class="d-flex table-responsive justify-content-center mt-4 ">
        <table class="table table-border justify-content-center">
            <thead class="bg-dark">
                <tr>
                    <th scope="col" style="color:white">GAME TITLE</th>
                    <th scope="col" style="color:white">GAME PRICE</th>
                    <th scope="col" style="color:white">QUANTITY</th>
                    <th scope="col" style="color:white">SUB TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d )

                <tr class='gamerow'>
                    <th scope="row">

                        {{ $d->getGame->title }}
                    </th>
                    <td>${{ $d->getGame->price }}</td>


                    <td>
                        <div name="quantity" class="">{{ $d->quantity }}</div>
                    </td>
                    <td><div class="">${{ $d->quantity*$d->getGame->price }}</div></td>
                    @php
                    $total=0;
                    for ($i=0;$i<count($data);$i++){

                    $total +=$data[$i]->quantity*$data[$i]->getGame->price;
                    }
                    @endphp
                </tr>
                @endforeach
                <tr style="border:1px solid white;">
                    <td>&nbsp;<td>
                <td colspan="1"><h3 class="text">
                    Total:
                </h3></td>
                <td><h3 class="">${{ $total }}<h3></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
