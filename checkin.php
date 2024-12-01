<?php
include 'config.php'; // Menghubungkan ke database

// Inisialisasi variabel untuk menampilkan pesan
$message = "";

// Proses jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $identity_number = $_POST['identity_number'];
    $room_type = $_POST['room_type'];
    $email = $_POST['email']; // Menambahkan email
    $price = 0;

    // Set harga berdasarkan tipe kamar
    switch ($room_type) {
        case 'Standard':
            $price = 500000;
            break;
        case 'Deluxe':
            $price = 750000;
            break;
        case 'Family':
            $price = 1000000;
            break;
    }

    $booking_date = $_POST['booking_date'];
    $stay_duration = $_POST['stay_duration'];
    $breakfast = $_POST['breakfast'] == '1' ? true : false;

    // Hitung total harga
    $total_price = $price * $stay_duration;
    if ($breakfast) {
        $total_price += 80000; // Tambahan untuk sarapan
    }
    if ($stay_duration > 3) {
        $total_price *= 0.9; // Diskon 10%
    }

    // Simpan ke database
    $stmt = $pdo->prepare("INSERT INTO reservations (name, gender, identity_number, room_type, price, booking_date, stay_duration, breakfast, total_price, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$name, $gender, $identity_number, $room_type, $price, $booking_date, $stay_duration, $breakfast, $total_price, $email])) {
        // Redirect ke halaman konfirmasi dengan data pemesanan
        header("Location: confirmation.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&checkin=" . urlencode($booking_date) . "&checkout=" . urlencode($booking_date) . "&guests=" . urlencode($stay_duration) . "&total_price=" . urlencode(number_format($total_price, 2)));
        exit();
    } else {
        $message = "Terjadi kesalahan saat menyimpan pemesanan.";
    }
}
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
    <script>
        function validateIdentityNumber() {
            const identityNumber = document.getElementById('identity_number').value;
            if (identityNumber.length !== 16 || isNaN(identityNumber)) {
                alert("Nomor identitas harus terdiri dari 16 angka.");
                return false;
            }
            return true;
        }
    </script>
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
                        <li class="nav-item"><a class="nav-link active" href="#hotel-options">Detail</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Form Pemesanan Hotel</h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="booking-section section-padding" id="form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <form action="process_booking.php" method="post" class="custom-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Pemesan</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="" disabled selected>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="identity_number" class="form-label">Nomor Identitas</label>
                                <input type="text" class="form-control" id="identity_number" name="identity_number" pattern="\d{16}" title="Harus 16 digit" required>
                            </div>
                            <div class="mb-3">
                                <label for="room_type" class="form-label">Tipe Kamar</label>
                                <select class="form-select" id="room_type" name="room_type" required>
                                    <option value="" disabled selected>Pilih tipe kamar</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="booking_date" class="form-label">Tanggal Pesan</label>
                                <input type="date" class="form-control" id="booking_date" name="booking_date" required
                                min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="stay_duration" class="form-label">Durasi Menginap (Hari)</label>
                                <input type="number" class="form-control" id="stay_duration" name="stay_duration" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="breakfast" class="form-label">Termasuk Breakfast?</label>
                                <select class="form-select" id="breakfast" name="breakfast" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Bayar</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" onclick="calculateTotal()">Hitung Total Bayar</button>
                            <button type="submit" class="btn btn-primary btn-lg px-4 me-sm-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
        <!-- Hotel Options Section -->
        <section class="py-5" id="hotel-options">
            <div class="container px-5 my-5">
                <h2 class="fw-bolder mb-4 text-center">Room Types</h2>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel1.jpg" alt="Hotel 1" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Standard</h5>
                                <p class="card-text">The Standard Room offers a comfortable and cozy atmosphere, perfect for solo travelers or couples. It features a queen-sized bed, ensuring a restful stay at an affordable price.</p>
                                <a href="checkin.php" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel2.jpg" alt="Hotel 2" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Deluxe</h5>
                                <p class="card-text">The Deluxe Room provides a more spacious and luxurious experience, ideal for guests seeking extra comfort. It includes a king-sized bed and a well-appointed bathroom with premium toiletries.</p>
                                <a href="checkin.php" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top hotel-image" src="images/hotel3.jpg" alt="Hotel 3" />
                            <div class="card-body p-4">
                                <h5 class="card-title">Family</h5>
                                <p class="card-text">The Family Room is designed to accommodate larger groups or families, offering ample space and comfort. It features multiple beds and a cozy living area.</p>
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
        <!-- Blog preview section-->
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
        <section class="py-5">
                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                            </div>
                            <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
    function calculateTotal() {
        const roomType = document.getElementById('room_type').value;
        const stayDuration = parseInt(document.getElementById('stay_duration').value);
        let price = 0;

        // Set price based on room type
        switch (roomType) {
            case 'Standard':
                price = 500000;
                break;
            case 'Deluxe':
                price = 750000;
                break;
            case 'Family':
                price = 1000000;
                break;
        }

        let total = price * stayDuration;

        // Check for breakfast
        const breakfast = document.getElementById('breakfast').value;
        if (breakfast === '1') {
            total += 80000; // Tambahan untuk sarapan
        }

        // Apply discount if stay duration is more than 3 days
        if (stayDuration > 3) {
            total *= 0.9; // Diskon 10%
        }

        document.getElementById('price').value = price.toFixed(2);
        document.getElementById('total_price').value = total.toFixed(2);
    }
    </script>

</body>
</html>
