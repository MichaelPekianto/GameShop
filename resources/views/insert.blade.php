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
        <h2 class="fw-bold mb-5">Add Game</h2>

        <form action="/insert" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-5" style="color:gray;">
                <label for="inputtitle" class="col-sm-2 col-form-label">Game Title</label>
                <div class="col-sm-10">
                    <input name="title" type="text"
                        class="form-control @error('title') is-invalid @enderror" id="title" autofocus>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-5" style="color:gray;">
                <label for="inputPhoto" class="col-6 col-sm-2 col-form-label">Photo</label>
                {{-- <div id="preview-image" class="" style="margin-bottom: 0rem;"> --}}
                <img id="profile-image" class='col-6 col-sm-1 rounded-circle'
                    style="width:75px;height: 50px;visibility: hidden;">
                {{-- </div> --}}
                <div class="col-6 col-sm-5"></div>
                <div class="col-6 col-sm-4">
                    <input name="photo" type="file" style='color:#6610f2;'onchange="readURL(this)"
                        class="form-control @error('photo') is-invalid @enderror" id="photo">

                    @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-5" style="color:gray;">
                <label for="inputDesc" class="col-sm-2 col-form-label">Game Description</label>
                <div class="col-sm-10">
                    <textarea name="desc" type="text"rows="4"cols="50"
                        class="form-control @error('desc') is-invalid @enderror" id="desc"></textarea>
                    @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-5" style="color:gray;">
                <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input name="price" type="value" class="form-control @error('price') is-invalid @enderror" id="price">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-5" style="color:gray;">
                <label for="inputGenre" class="col-sm-2 col-form-label">Game Genre</label>
                <div class="col-sm-10">
                    <select name="genre" id="inputGenre" class="form-select" onchange="select()">
                        @foreach ($data as $d)

                        <option>{{ $d->genre }}</option>

                        @endforeach
                        <option value="1">Add New Genre</option>
                    </select>
                </div>
            </div>
            <div id="NewGgenre"class="row mb-5" style="color:gray;visibility:hidden;">
                <label for="inputNewGenre" class="col-sm-2 col-form-label">Add New Genre</label>
                <div class="col-sm-10">
                    <input name="newGenre" type="text" class="form-control @error('newGenre') is-invalid @enderror" id="newGenre">
                    @error('newGenre')
                    <script>
                            document.getElementById('NewGgenre').style.visibility='visible';
                    </script>
                    <div class="invalid-feedback"id="errornewgenre">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>

           <div class="row mb-5" style="color:gray;">
                <label for="inputRating" class="col-sm-2 col-form-label">PEGI Rating</label>
                <div class="col-sm-10">
                    <select name="PEGI_rating" id="inputRating" class="form-select" >

                        <option>0</option>
                        <option>3</option>
                        <option>7</option>
                        <option>12</option>
                        <option>16</option>
                        <option>18</option>

                    </select>
                </div>
            </div>
            <div class="position-relative">
                <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary"
                    style="border:none;background-color:#6610f2;">Add</button>
            </div>

        </form>

    </div>
    <script src="{{ asset('js/file.js') }}"></script>
    @endsection
</body>

</html>
