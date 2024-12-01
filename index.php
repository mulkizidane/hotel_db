<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>The Continental</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .hotel-image {
            width: 100%; /* Mengatur lebar gambar agar responsif */
            height: 200px; /* Mengatur tinggi gambar */
            object-fit: cover; /* Memastikan gambar terpotong dengan baik */
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s; /* Animasi transisi */
        }

        .card:hover {
            transform: scale(1.1); /* Membesarkan kartu saat hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan */
        }

    </style>
</head>
<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">The Continental</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="checkin.php">Checkin</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#features">Detail</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">The Continental</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Experience the difference at The Continental, where every detail is crafted with care to make your stay truly exceptional.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#hotel-options">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#location">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/header.jpg" alt="..." /></div>
                </div>
            </div>
        </header>
        <!-- Hotel Options Section -->
        <section class="py-5" id="hotel-options">
            <div class="container px-5 my-5">
                <h2 class="fw-bolder mb-4 text-center">Choose Your Hotel</h2>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel1.jpg" alt="Hotel 1" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Standard</h5>
                                <p class="card-text">Rp.500.000</p>
                                <a href="checkin.php" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel2.jpg" alt="Hotel 2" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Deluxe</h5>
                                <p class="card-text">Rp.750.000</p>
                                <a href="checkin.php" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel3.jpg" alt="Hotel 3" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Family</h5>
                                <p class="card-text">Rp.1.000.000</p>
                                <a href="checkin.php" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Exceptional Amenities for Every Guest</h2></div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-house-door"></i></div>
                                <h2 class="h5">Comfortable Accommodations</h2>
                                <p class="mb-0">Enjoy a restful night's sleep in our well-appointed rooms, designed for your comfort and relaxation.</p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-restaurant"></i></div>
                                <h2 class="h5">Dining Options</h2>
                                <p class="mb-0">Savor delicious meals at our on-site restaurant, featuring a diverse menu to satisfy every palate.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-basket"></i></div>
                                <h2 class="h5">Convenient Services</h2>
                                <p class="mb-0">Take advantage of our concierge services, laundry facilities, and room service for a hassle-free stay.</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                                <h2 class="h5">Family-Friendly Environment</h2>
                                <p class="mb-0">Our hotel is designed to cater to families, offering spacious rooms and activities for all ages.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"Staying at The Continental was a delightful experience! The staff was friendly, and the amenities were top-notch!"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="images/i.jpg" alt="..." />
                                <div class="fw-bold">
                                    Mulki Muhammad Zidane
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    Ceo The Continental
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="py-5" id="location">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">The Continental Location</h1>
                                <p class="lead fw-normal text-muted mb-0">Nestled in a prime location, The Continental offers easy access to major attractions, shopping districts, and cultural landmarks. Whether you're here for business or leisure, our hotel is the perfect base for exploring everything the city has to offer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"> <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <a class="text-decoration-none" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.819917806043!2d103.84793601429608!3d1.281807962148459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da190c2c94ccb3%3A0x11213560829baa05!2sTwitter!5e0!3m2!1sen!2smy!4v1669212183861!5m2!1sen!2smy">
                                    View Location
                                    <i class="bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; The Continental</div></div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
