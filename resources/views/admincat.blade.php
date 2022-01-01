@extends('layouts.masteradmin');

@section('content')
<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">افزودن موضوع</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">حذف موضوع</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <br>
      <form action="{{route('admincat.create')}}" method = "post">
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
              <label for="Input1"><b>عنوان فارسی</b> </label>
              <input type="text" class="form-control" id="Input1" placeholder="عنوان دسته بندی خود را به فارسی وارد کنید!" name="titlefa">
              <span class="text-danger">@error('titlefa'){{ $message}} @enderror</span>
          </div>
          <div class="form-group">
            <label for="Input2"><b>عنوان انگلیسی</b> </label>
            <input type="text" class="form-control" id="Input2" placeholder="عنوان دسته بندی خود را به انگلیسی وارد کنید!" name="titleeng">
            <span class="text-danger">@error('titleeng'){{ $message}} @enderror</span>
        </div>
          <div class="form-group">
              <label for="Select1"> <b>موضوع  پدر را انتخاب کنید</b></label>
              <select class="form-control" id="Select1" name = "category">
                  @foreach ($CategoryList as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                  @endforeach
              </select>
          </div>
            <button class="btn btn-primary" type="submit">ثبت دسته بندی</button>
      </form>
  </div>
  
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <br>
      <form action="{{ route('admincat.delete') }}" method = "post">
          @csrf
          <div class="form-group">
              <label for="Select1"> <b>آگهی غیراصلی که میخواهید حذفش کنید را انتخاب کنید</b></label>
              <select class="form-control" id="Select1" name = "title">
                  @foreach ($CategoryList2 as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                  @endforeach
              </select>
          </div>
          <button class="btn btn-primary" type="submit">حذف آگهی</button>
      </form>
  </div>
</div>
@endsection

@section('sidebar')
    <h6>شما فقط قادر به ساخت و</h6>
    <h6>حذف آگهی های غیر والد هستید</h6>
     
@endsection