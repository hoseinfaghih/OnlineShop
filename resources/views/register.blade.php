@extends('layouts.master')

@section('content_title')
<br>
ثبت نام
@endsection

@section('content')
<form action = "{{ route ('user.save') }}" method="post" >
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
    @csrf
    <div class="form-group text-right">
        <label for="">نام:</label>
        <input type="text" class = "form-control" name="name" placeholder="نام خود را وارد کنید" value = "{{ old ('name') }}">
        <span class="text-danger">@error('name'){{ $message}} @enderror</span>   
    </div>
    <div class="form-group text-right">
        <label for="">ایمیل:</label>
        <input type="text" class = "form-control" name="email" placeholder="ایمیل خود را وارد کنید" value = "{{ old('email')}}">
        <span class="text-danger">@error('email'){{ $message}} @enderror</span>   
    </div>
    <div class="form-group text-right">
        <label for="">رمزعبور:</label>
        <input type="password" class = "form-control" name="password" placeholder="رمزعبور را وارد کنید">
        <span class="text-danger">@error('password'){{ $message}} @enderror</span>   
    </div>
    <button type="submit" class = "btn btn-block mt-1 btn-primary">ثبت نام </button>
    <br>
    <a href="{{ route('user.login') }}">عضو هستم میخواهم وارد شوم</a>
</form>
@endsection

@section('sidebar')
    @foreach ($CategoryList as $item)
    <li class="nav-item" style = "clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">
        <a class="nav-link active" href="{{route('category.show' , $item['id'])}}">{{ $item['name']}}</a>
    </li>
    @endforeach
@endsection
