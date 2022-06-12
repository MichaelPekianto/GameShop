@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/managegame.css">
<div class="container d-flex flex-column justify-content-center mb-4 mx-auto">
    
    <div class="d-flex justify-content-center mt-4">
        <table class="gamerow table table-borderless table-hover mx-5 justify-content-center">
            <thead>
                <tr>


                    <th scope="col" style="color:gray">GAME GENRE</th>

                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d )

                <tr class='gamerow'>
                    <th scope="row">

                        {{ $d->genre }}
                    </th>


                    <td><a href="/updategenre/{{ $d->id}}" class="updatebtn btn btn-white" style="color:#6610f2;">Edit</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
