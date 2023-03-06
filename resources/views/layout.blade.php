


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="" href=" {{ asset('assets/deshboard/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="" href=" {{ url('assets/deshboard/css/style.css') }}" /> 
  <link rel="stylesheet" type="" href=" {{ url('assets/deshboard/css/responsive.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;500;700;900&family=Rubik:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</head>

<body>
  <!-- sidebar menu start -->
  <div class="page-container">
    <div class="sidebar-menu"> 
      <div class="sidebar-header">
        <div class="logo">
          <a href="index.html"><img src="{{asset('assets/deshboard/img/290018488_1110770999821005_2691879510461168954_n.png')}}" alt="Admin Panel"></a>
        </div>
      </div>
      <div class="header-text">
        <a href="{{ route('product.index') }}"><i class="bi bi-house-door"></i>Dashboard</a>
      </div>
      <div class="main-menu">
        <div class="menu-inner">
          <nav>
            <ul class="metismenu" id="menu">
              <li class="management">Management</li>
              <li>
                <a href="{{ route('category') }}"  
                 ><i class="bi bi-graph-up"></i><span>Products Category</span>
                </a>

                <ul class="collapse show" id="services">
                  <li><a href="{{ route('sub.Category') }}">Product Sub Category</a></li>
                  <li><a href="{{ route('color.index') }}">Product Colors</a></li>
                  <li><a href="{{ route('size.index') }}">Product Sizes</a></li>
                  <li><a href="{{ route('packet.index') }}">Product Packet</a></li>
                </ul>
              </li>
              {{-- <li><a href="user.php" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Registration </span>
                </a>
              </li> --}}
              <li>
                <a href="{{ route('logout') }}" data-bs-toggle="collapse show"aria-expanded="true"><i
                    class="bi bi-graph-up"></i><span>Log Out </span>
                </a>
                {{-- <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <button type="submit"><i
                      class="bi bi-graph-up"></i><span>Log Out </span></button>
                  </form> --}}
                  
                
              </li>         
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- sidebar menu End -->

    <!-- header area start -->
    <div class="main-content">
      <div class="header-area sticky-top ">
        <div class="row align-items-center">
          <div class="col-md-2 col-sm-2 header-left">
            <div class="nav-btn pull-left">
              <span><i class="bi bi-list"></i></span>
            </div>
          </div>
         
        </div>
      </div>
      <!-- header area end -->

      <!-- main content area start -->
      @yield('body')
    </div>
  </div>
  <script src="{{ asset('/assets/deshboard/js/jquery-2.2.4.min.js') }}" ></script>
  <script src="{{ asset('/assets/deshboard/js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('/assets/deshboard/js/app.js') }}"></script>
  <script>
    function onclickErrorHide() {
        var displayStatus = document.querySelector(".alert");
        displayStatus.style.display = 'none';
    };
</script>


  <!-- <script src="./js/jquery-2.2.4.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./js/app.js"></script> -->
</body>

</html>