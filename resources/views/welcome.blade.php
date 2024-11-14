<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Management System</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="{{ asset('assets/Landing-Page/css/landing-styles.css') }}" rel="stylesheet">

    <style>
        .hero-img {
            background-image: url();
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
        }
        
    </style>

</head>

<body>
    <div class="container-fluid">


        <!--Navbar start-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light custom-sticky">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Employee Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex w-100 justify-content-center">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">News</a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Right-aligned Login and Register buttons -->
                    <div class="ms-auto d-flex align-items-center">
                        <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="/register" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--Navbar end-->

        <!--Hero-section start-->
        <div class="container hero-img">

        </div>
        <!--Hero-section end-->

        <!--About-Us-section start-->
        <div class="container mt-5">
            <h2 class="text-center">About Us</h2>

        </div>
        <!--About-Us-section end-->



    </div>

</body>

</html>
