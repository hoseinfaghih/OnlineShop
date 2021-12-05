@extends('layouts.master');

@section('content')
    @foreach ($AdsInfo as $item)
    <div class="card" style="width: 18rem;display:inline-block">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $item['title']}}</h5>
            <p class="card-text">{{ $item['description']}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">قیمت : {{$item['price']}}</li>
            <li class="list-group-item">موبایل : {{$item['phone_number']}}</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">اطلاعات بیشتر</a>
        </div>
    </div>
    @endforeach
    <span>
        {{$AdsInfo->links()}}
    </span>
    <style>
        .w-5{
            display: none;
        }
    </style>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection