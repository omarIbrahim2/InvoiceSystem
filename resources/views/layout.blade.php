<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نظام اصدار فواتير</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body>
    
    <body>
      <form id="logoutForm" method="POST" action="{{route('logout')}}">
          @csrf    
      </form>
    
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">اسم المستخدم : {{Auth::user()->name}}</a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-nav">
            <div class="nav-item text-nowrap">
              
              <button form="logoutForm" id="logoutLink" class="nav-link px-3 fa-border-none bg-transparent">تسجيل الخروج</button>
            </div>
          </div>
        </header>
        
        <div class="container-fluid">
          <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
              <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Products')}}">
                      <span data-feather="shopping-cart" class="align-text-bottom"></span>
                      المنتجات
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Customers')}}">
                      <span data-feather="users" class="align-text-bottom"></span>
                        العملاء
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Invoices')}}">
                      <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                      الفواتير
                    </a>
                  </li>
               
                </ul>

                
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">لوحة القيادة</h1>
              </div>
               

             
                @yield('content')
             
            </main>

          
          </div>
        </div>
        

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>     
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>