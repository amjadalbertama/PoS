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
  <link href="{{ asset('style/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('style/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('style/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        .centered {
            text-align: center;
        }
        .jarakatas {
            margin-top: 20px;
        }
    </style>
</head>

<body class="d-flex justify-content-center" style="background-repeat: no-repeat; background-attachment: fixed;">
            <div class="container mt-5">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="centered mb-4" style=" margin-top: 10%;">
                                    <img src="{{ asset('style/assets/img/logo.png')}}" alt="Logo" class="img-fluid">
                                </div>
                                <h4 class="centered mb-4">Login</h4>
                                <form action="{{ route('loginpost')}}" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Role:</label>
                                        <select class="form-select" aria-label="Default select example" name="id_role">
                                            <option value="1">Admin</option>
                                            <option value="2">user</option>
                                            <!-- <option value="tes">Two</option>
                                            <option value="dummy">Three</option> -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Branch:</label>
                                        <select class="form-select" aria-label="Default select example" name="id_cabang"> 
                                            <option value="1">Cabang 1</option>
                                            <option value="2">Cabang 2</option>
                                            <option value="3">Cabang 3</option>
                                            <option value="4">Cabang 4</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" href="">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- .container -->

        <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

        <!-- Vendor JS Files -->
        <script src="{{ asset('style/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{ asset('style/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('style/assets/js/main.js')}}"></script>
</body>
</html>