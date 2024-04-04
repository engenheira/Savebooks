<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Savebooks - plataforma de livros">
  <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
  <link rel="shortcut icon" href="favicon.ico">

  <!-- FontAwesome JS-->
  <script defer src="{{url('assets/plugins/fontawesome/js/all.min.js')}}"></script>

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="{{url('assets/css/portal.css')}}">

</head>

<body class="app">
  <header class="app-header fixed-top">
    <div class="app-header-inner">
      <div class="container-fluid py-2">
        <div class="app-header-content">
          <div class="row justify-content-between align-items-center">

            <div class="col-auto">
              <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                  <title>Menu</title>
                  <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
              </a>
            </div><!--//col-->
    

            <div class="app-utilities col-auto">
           
           

              <div class="app-utility-item app-user-dropdown dropdown">
                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  {{Auth::user()->name}}
              </a>
                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                  <li><a class="dropdown-item" href="{{url('admin/logout')}}">Sair</a></li>
                </ul>
              </div><!--//app-user-dropdown-->
            </div><!--//app-utilities-->
          </div><!--//row-->
        </div><!--//app-header-content-->
      </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel">
      <div id="sidepanel-drop" class="sidepanel-drop"></div>
      <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
          <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">Savebooks</span></a>

        </div><!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
          <ul class="app-menu list-unstyled accordion" id="menu-accordion">
            <li class="nav-item">
              <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
              <a class="nav-link active" href="index.html">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Overview</span>
              </a><!--//nav-link-->
            </li><!--//nav-item-->
            <li class="nav-item">
              <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
              <a class="nav-link" href="{{url('admin/author')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bi">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                  </svg>

                </span>
                <span class="nav-link-text">Autores</span>
              </a><!--//nav-link-->
            </li><!--//nav-item-->
            <li class="nav-item">
              <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
              <a class="nav-link" href="{{url('admin/book')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bi">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                  </svg>

                </span>
                <span class="nav-link-text">Livros</span>
              </a><!--//nav-link-->
            </li><!--//nav-item-->
       
            </ul><!--//footer-menu-->
          </nav>
        </div><!--//app-sidepanel-footer-->

      </div><!--//sidepanel-inner-->
    </div><!--//app-sidepanel-->
  </header><!--//app-header-->

  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">



        @yield('content')

      </div><!--//container-fluid-->
    </div><!--//app-content-->



  </div><!--//app-wrapper-->


  <!-- Javascript -->
  <script src="{{url('assets/plugins/popper.min.js')}}"></script>
  <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Charts JS -->
  <script src="{{url('assets/plugins/chart.js/chart.min.js')}}"></script>
  <script src="{{url('assets/js/index-charts.js')}}"></script>

  <!-- Page Specific JS -->
  <script src="{{url('assets/js/app.js')}}"></script>


  @yield('js')
</body>

</html>