@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <div class="bg-dark w-25 p-2 m-1">
        @foreach ($categories as $category)
        <div class="nav-item active p-2">
            <a class="nav-link text-white font-weight-bold" href="">{{$category->label}}</a>
        </div>
        @endforeach
    </div>
    <div class="w-75">
        <div class="d-flex justify-content-center" >
            <h1>Topics</h1>
        </div>
    </div>
</div>    


@endsection