<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/profile.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/insertgame.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h2 class="fw-bold mb-5">Update Game</h2>

        <form action="/updategenre/{{ $data->id }}" method="post">
            @csrf


            <div class="row mb-5" style="color:gray;">
                <label for="inputGenre" class="col-sm-2 col-form-label">Game Genre</label>
                <div class="col-sm-10">
                    <input name="genre" value="{{  $data->genre }}" type="text"
                        class="form-control @error('genre') is-invalid @enderror" id="genre" autofocus>
                    @error('genre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="position-relative">
                <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary"
                    style="border:none;background-color:#6610f2;">Update</button>
            </div>

        </form>

    </div>

    @endsection
</body>

</html>
