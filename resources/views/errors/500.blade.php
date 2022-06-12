<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>500 Internal server error!</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('dist/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/css/vendor.bundle.base.css') }}">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dist/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="../../images/favicon.png" /> --}}
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row align-items-center d-flex flex-row">
                            <div class="col-lg-6 text-lg-right pr-lg-4">
                                <h1 class="display-1 mb-0">500</h1>
                            </div>
                            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h2>SORRY!</h2>
                                <h3 class="font-weight-light">Internal server error!</h3>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <a class="text-white font-weight-medium" href="../../index.html">Back to home</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">Copyright &copy; 2022 All rights
                                    reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('dist/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('dist/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dist/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dist/js/template.js') }}"></script>
    <script src="{{ asset('dist/js/settings.js') }}"></script>
    <script src="{{ asset('dist/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
