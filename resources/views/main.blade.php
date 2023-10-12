
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') POS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('style/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('style/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="{{ asset('style/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/css/custom.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('style/assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">POS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
{{-- 
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <a href="" type="button" class="btn btn-primary" hidden>Login</a>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('style/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Mimin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Mimin</h6>
              <span>Administration</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/datamaster') }}">
              <i class="bi bi-circle"></i><span>Data Master</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/add/datamaster/category') }}">
              <i class="bi bi-circle"></i><span>Categories</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/add/datamaster/unit') }}">
              <i class="bi bi-circle"></i><span>Packs</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/add/datamaster') }}">
              <i class="bi bi-circle"></i><span>Item</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
         <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Stock</span>
            </a>
          </li> -->
          <li>
            <a href="{{ url('/distributin') }}">
              <i class="bi bi-circle"></i><span>Distribution In</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/distributout') }}">
              <i class="bi bi-circle"></i><span>Distribution Out</span>
            </a>
          </li>
        </ul> 
      </li>
      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-layout-text-window-reverse"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/suppliers') }}">
              <i class="bi bi-circle"></i><span>Data Suppliers</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/add/suppliers') }}">
              <i class="bi bi-circle"></i><span>Add New Supplier</span>
            </a>
          </li>
        </ul> 
      </li><!-- End Tables Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#branch-store" data-bs-toggle="collapse" href="">
          <i class="bi bi-building"></i><span>Branch Store</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="branch-store" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/suppliers') }}">
              <i class="bi bi-circle"></i><span>Data Branch Store</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/add/suppliers') }}">
              <i class="bi bi-circle"></i><span>Add New Branch</span>
            </a>
          </li>
        </ul> 
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-card-list"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/sales') }}">
              <i class="bi bi-circle"></i><span>Sales</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/onlinesales') }}">
              <i class="bi bi-circle"></i><span>Online Sales</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/stockin') }}">
              <i class="bi bi-circle"></i><span>Stock In</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/stockout') }}">
              <i class="bi bi-circle"></i><span>Stock Out</span>
            </a>
          </li>
          {{-- <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Stock Opname</span>
            </a>
          </li> --}}
          {{-- <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Stock Return</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('/report/sales')}}">
                    <i class="bi bi-circle"></i><span>Sales</span>
                </a>
            </li>
            <!-- <li>
                <a href="/pos/pos/public/reports/stockin">
                    <i class="bi bi-circle"></i><span>Stock In</span>
                </a>
            </li>
            <li>
                <a href="icons-boxicons.html">
                    <i class="bi bi-circle"></i><span>Stock Out</span>
                </a>
            </li> -->
        </ul>
      </li><!-- End Charts Nav -->

      

      <li class="nav-heading">Settings</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/users') }}">
          <i class="bi bi-person"></i>
          <span>Users/Employees</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/users') }}">
            <i class="bi bi-gear"></i>
          <span>Configuration</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  @yield('content')
  

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer> --}}
  
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('style/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('style/assets/vendor/php-email-form/validate.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('style/assets/js/main.js')}}"></script>

</body>

</html>