@extends('layouts.master');

@section('sidebar')
    @foreach ($CategoryList as $item)
    <li class="nav-item" style = "clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">
        <a class="nav-link active" href="{{route('category.show' , $item['id'])}}">{{ $item['name']}}</a>
    </li>
    @endforeach
@endsection

@section('content')
@foreach ($FavInfo as $item)
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
        <a href="{{route('ad.show',$item['id'])}}" class="card-link">اطلاعات بیشتر</a>
    </div>
</div>
@endforeach
<span>
    {{$FavInfo->links()}}
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