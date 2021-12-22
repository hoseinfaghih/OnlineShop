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
      @if (session()->has('LoggedUser'))
        <tr>
          <th>افزودن به علاقه مندی ها</th>
          <td>  
            <form  action = "{{ route('ad.addtofav',$AdInfo['id']) }}" method = "get" class="spacer" action="" method="post">
              <input class="submit" type="submit" value="افزودن" />
            </form>
          </td>
        </tr>
      @endif
    </tbody>
    @if (Session::get('success'))
        <div class = "alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif   
    @if (Session::get('fail'))
        <div class = "alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
@endsection

@section('sidebar')
    @foreach ($CategoryList as $item)
    <li class="nav-item" style = "clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">
        <a class="nav-link active" href="{{route('category.show' , $item['id'])}}">{{ $item['name']}}</a>
    </li>
    @endforeach
@endsection