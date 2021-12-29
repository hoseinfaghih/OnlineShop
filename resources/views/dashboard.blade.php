@extends('layouts.master');

@section('content')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">افزودن آگهی جدید</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">ویرایش آگهی قبلی</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">حذف آگهی قبلی</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <br>
        <form action="{{route('ad.create')}}" method = "post">
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
            <div class="form-group">
                <label for="Input1"><b>عنوان</b> </label>
                <input type="text" class="form-control" id="Input1" placeholder="عنوان خود را وارد کنید!" name="title">
                <span class="text-danger">@error('title'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Select1"> <b>موضوع آگهی را انتخاب کنید</b></label>
                <select class="form-control" id="Select1" name = "category">
                    @foreach ($CategoryList as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Input2"><b>تلفن همراه</b> </label>
                <input type="text" class="form-control" id="Input2" placeholder="شماره موبایل خود را وارد کنید" name="phonenumber">
                <span class="text-danger">@error('phonenumber'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Input3"><b>قیمت</b> </label>
                <input type="text" class="form-control" id="Input3" placeholder="هزینه مدنظر خود را وارد کنید" name="price">
                <span class="text-danger">@error('price'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Textarea1"><b>توضیحات</b></label>
                <textarea class="form-control" id="Textarea1" rows="3" name = "description" placeholder="توضیحات خود را درباره آگهی وارد کنید"></textarea>
                <span class="text-danger">@error('description'){{ $message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="Textarea2"><b>آدرس</b></label>
                <textarea class="form-control" id="Textarea2" rows="3" name ="address" placeholder="آدرس خود را وارد کنید"></textarea>
                <span class="text-danger">@error('address'){{ $message}} @enderror</span>
              </div>
              <button class="btn btn-primary" type="submit">ثبت آگهی</button>
        </form>
    </div>
    
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <br>
        <form action="{{ route('ad.update') }}" method = "post">
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
            <div class="form-group">
                <label for="Select1"> <b>آگهی قبلی که میخواهید ویرایشش کنید را انتخاب کنید</b></label>
                <select class="form-control" id="Select1" name = "titleprev">
                    @foreach ($MyAdsList as $item)
                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Input1"><b> عنوان جدید</b> </label>
                <input type="text" class="form-control" id="Input1" placeholder="عنوان خود را وارد کنید!" name="titlenew">
                <span class="text-danger">@error('titlenew'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Select1"> <b>موضوع آگهی جدید را انتخاب کنید</b></label>
                <select class="form-control" id="Select1" name = "category">
                    @foreach ($CategoryList as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Input2"><b> تلفن همراه جدید</b> </label>
                <input type="text" class="form-control" id="Input2" placeholder="شماره موبایل خود را وارد کنید" name="phonenumber">
                <span class="text-danger">@error('phonenumber'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Input3"><b>قیمت جدید</b> </label>
                <input type="text" class="form-control" id="Input3" placeholder="هزینه مدنظر خود را وارد کنید" name="price">
                <span class="text-danger">@error('price'){{ $message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="Textarea1"><b>توضیحات جدید</b></label>
                <textarea class="form-control" id="Textarea1" rows="3" name = "description" placeholder="توضیحات خود را درباره آگهی وارد کنید"></textarea>
                <span class="text-danger">@error('description'){{ $message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="Textarea2"><b>آدرس جدید</b></label>
                <textarea class="form-control" id="Textarea2" rows="3" name ="address" placeholder="آدرس خود را وارد کنید"></textarea>
                <span class="text-danger">@error('address'){{ $message}} @enderror</span>
              </div>
              <button class="btn btn-primary" type="submit">ثبت مشخصات جدید</button>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
        <form action="{{ route('ad.delete') }}" method = "post">
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
            <div class="form-group">
                <label for="Select1"> <b>آگهی قبلی که میخواهید حذفش کنید را انتخاب کنید</b></label>
                <select class="form-control" id="Select1" name = "title">
                    @foreach ($MyAdsList as $item)
                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">حذف آگهی</button>
        </form>
    </div>
  </div>
    
@endsection

@section('sidebar')
    @foreach ($CategoryList as $item)
    <li class="nav-item" style = "clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">
        <a class="nav-link active" href="{{route('category.show' , $item['id'])}}">{{ $item['name']}}</a>
    </li>
    @endforeach
@endsection