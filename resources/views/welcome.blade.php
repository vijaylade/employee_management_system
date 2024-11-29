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

        /* Hero section styles */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('https://source.unsplash.com/1920x1080/?business,teamwork') center center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-description {
            font-size: 1.25rem;
            margin-top: 15px;
        }

        .about-section {
            padding: 60px 20px;
            background-color: #f8f9fa;
        }

        .contact-section {
            padding: 60px 20px;
            background-color: #e9ecef;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Employee Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                    </ul>
                    <div>
                        <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                        <a href="/register" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <h1 class="hero-title">Welcome to Employee Management System</h1>
                <p class="hero-description">Efficiently manage your workforce with our intuitive tools.</p>
                <a href="/register" class="btn btn-primary btn-lg mt-4">Get Started</a>
            </div>
        </div>

        <!-- About Us Section -->
        <section id="about" class="about-section">
            <div class="container text-center">
                <h2>About Us</h2>
                <p class="mt-4">
                    Our Employee Management System is designed to help organizations streamline their HR processes,
                    track employee performance, and manage resources effectively. Join us to transform the way you
                    manage your workforce.
                </p>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <h5>Mission</h5>
                        <p>Empowering businesses with innovative solutions.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Vision</h5>
                        <p>Transforming workforce management globally.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Values</h5>
                        <p>Commitment, Integrity, and Excellence.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <h2 class="text-center">Contact Us</h2>
                <p class="text-center mt-3">We'd love to hear from you! Fill out the form below to get in touch.</p>
                <form class="mt-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <p class="mb-0">© 2024 Employee Management System. All rights reserved.</p>
                <p class="mt-2">
                    <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                </p>
            </div>
        </footer>

    </div>


</body>

</html>
