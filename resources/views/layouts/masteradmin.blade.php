<!DOCTYPE html>
<html lang="fa" dir ="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src = "{{ asset ('js/app.js')}}"> </script>
    <title>Divar Cosplay</title>

    
</head>
<style>
  body {
   min-height: 400px;
   margin-bottom: 100px;
   clear: both;
  }
</style>
<header>
  <nav class="navbar navbar-expand-sm bg-success navbar-dark fixed-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route ('home') }}">
        <img src="/images/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
      </a>
      <ul class="navbar-nav ml-auto">
        
        

          <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.adedit') }}" style = "text-align: left" >مدیریت آگهی ها</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{  route('admin.catedit')}}" style = "text-align: left" >مدیریت دسته بندیها</a>
          </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="#">مدیریت کامنت ها</a>
        </li>
        
        
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </li>
      </ul>
      
    </div>
  </nav> 
</header>

<body>
  
  <div class="d-md-flex align-items-stretch">
      

    <nav id="sidebar" style ="border-left:1px solid #ccc;text-align:right;">
      {{-- <div class="p-4 pt-5">
        <br> --}}
        <br>
        <br>
        <br>
        <h5>پنل ادمین</h5>
        {{-- <ul class="list-unstyled components mb-5">
          <li>
            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">موضوع 1</a>
            <ul class="collapse list-unstyled" id="pageSubmenu1">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع1</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع2</a></li>
              
            </ul>
          </li>
          <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">موضوع 2</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع1</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع2</a></li>
              
            </ul>
          </li>
          <li>
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">موضوع 3</a>
            <ul class="collapse list-unstyled" id="pageSubmenu3">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع1</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع2</a></li>
              
            </ul>
          </li>
          <li>
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">موضوع 4</a>
            <ul class="collapse list-unstyled" id="pageSubmenu4">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع1</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> زموضوع2</a></li>
              
            </ul>
          </li>
        </ul> --}}
        <ul class="nav flex-column">
          @yield('sidebar')
            
        </ul>
        
      {{-- </div> --}}
    </nav>
    <!-- conttent -->
    <div id="content" class="p-4 p-md-5 pt-5" >
      <h2 class="mb-4" style="text-align:right">@yield('content_title')</h2>
        @yield('content')

    </div>


  </div>  
  <footer class="text-center text-white fixed-bottom bg-success">
    <!-- Grid container -->
    <div class="container p-4"></div>
    <!-- Grid container -->
    my Email : @hfaghih80@gmail.com
    <!-- Copyright -->
    <div class="text-center p-3 bg-success" >
      !All rights reserved lmao
      
    </div>
    <!-- Copyright -->
  </footer>
</body>
</html>