@extends('layouts.master');

@section('content_title')
    {{$AdInfo['title']}}
@endsection

@section('content')
<table class="table">
    <tbody>
      <tr>
        <th>تصویر</th>
        
      </tr>
      <tr>
        <th>نام آگهی گذار</th>
        <td>{{ $UserInfo['name']}}</td>
      </tr>
      <tr>
        <th>ایمیل آگهی گذار</th>
        <td> {{ $UserInfo['email'] }}</td>
      </tr>
      <tr>
        <th>توضیحات</th>
        <td> {{ $AdInfo ['description'] }}</td>
      </tr>
      <tr>
        <th>قیمت</th>
        <td> {{  $AdInfo['price']}}</td>
      </tr>
      <tr>
        <th>آدرس</th>
        <td>{{  $AdInfo['address']}}</td>
      </tr>
      <tr>
        <th>موبایل</th>
        <td> {{ $AdInfo['phone_number']}}</td>
      </tr>
    </tbody>
@endsection