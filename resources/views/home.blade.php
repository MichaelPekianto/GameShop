@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="container-fluid  mt-4">
    <div class="row justify-content-center">
        @if ($data->total()==0)
        <h2 class="text-center mx-auto">The Game is not found</h2>
        @else
        @foreach ($data as $item)
        <div class="col col-md-auto">
            <a href="/details/{{$item->id}}"class="card text-decoration-none d-flex text-center text-reset card mb-3" style="width: 15rem;height:20rem;">
                <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="card-img-top rounded-circle mx-auto mt-2"
                    style="width:80%;height:10rem" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-6 text-center text-wrap mb-4">{{ $item->title }}</h5>
                    <div class="card-text text-color-success text-center mb-4"><span class="position-absolute center translate-middle badge rounded-pill" style="color:green;background-color: #b2f7d3;">
                        {{ $item->getGenre->genre }}</span></div>
                    <p class="card-text text-center position-absolute bottom-0 start-50 translate-middle" >@if($item->price!=0)${{ $item->price }}@else{{ 'FREE' }}@endif</p>
                </div>
            </a>
        </div>
         @endforeach
    </div>
    <div class="d-flex justify-content-between mt-4">

    <div class="d-flex justify-content-start">Showing {{$data->firstItem()}} to
    {{$data->lastItem()}} of {{$data->total()}} results</div>
    <nav class="d-flex justify-content-end"aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ( $i=1 ;$i <=$data->lastPage() ;$i++)
            @if ($i == $data->currentPage())
            <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
            @else
            <li class="page-item "><a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a></li>
            @endif
            @endfor

            <li class="page-item">
                <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
    </div>
</div>
@endsection
