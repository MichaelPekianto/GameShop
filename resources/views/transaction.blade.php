@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/managegame.css">
<div class="container d-flex flex-column justify-content-center mb-4 mx-auto">
    <div class="d-flex justify-content-center mt-4">
        <table class="gamerow align-items-center table table-borderless table-hover mx-5 justify-content-center">
            <thead>
                <tr>
                    <th scope="col" style="color:gray">TRANSACTION ID</th>
                    <th scope="col" style="color:gray">TRANSACTION DATE</th>
                    <th scope="col" style="color:gray">Total Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d )

                <tr class='gamerow '>
                    <th scope="row">

                        {{ $d->id }}
                    </th>
                    <td>{{ $d->created_at }}</td>


                        <td><div name="quantity" class="">{{ $d->totalitem }}</div></td>
                    <td><a href="/transactiondetails/{{ $d->id}}" style="color:#6610f2;" class="align-items-start updatebtn btn btn-white">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
