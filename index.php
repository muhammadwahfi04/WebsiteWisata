<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk mengatur tampilan header */
        .navbar {
            background-color: #00aaff;
        }
        .navbar-nav .nav-link {
            color: white;
            margin-left: 20px;
            font-weight: bold;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .btn-book-now {
            background-color: #00aaff;
            color: white;
            font-weight: bold;
            border-radius: 50px;
        }

        /* CSS untuk carousel */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            filter: brightness(70%);
        }
        .carousel-caption h2 {
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .carousel-caption p {
            font-size: 1.2rem;
        }

        /* CSS untuk form pencarian */
        .search-section {
            background-color: #f7f7f7;
            padding: 30px;
            margin-top: -80px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-select, .form-control {
            border-radius: 50px;
            height: 45px;
        }

        /* CSS untuk grid card */
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card img {
            border-radius: 10px 10px 0 0;
            object-fit: cover;
            height: 200px;
        }
        .card-body {
            text-align: center;
        }
        .price-tag {
            font-size: 1.5rem;
            color: #00aaff;
            font-weight: bold;
        }

        /* CSS untuk footer */
        .footer {
            background-color: #00aaff;
            color: white;
            padding: 30px 0;
        }
        .footer a {
            color: white;
            text-decoration: none;
        }
    </style>
    <title>Wonderfull Bengkulu</title>
</head>
<body>

    <!-- Header dengan Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Wonderfull Bengkulu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li> -->
                    
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Fasilitas Wisata</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#paket_wisata">Paket Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Form_PemesananID">Pemesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="daftar_pemesanan.php">Daftar Pemesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Tentang">Tentang</a></li>
              
                </ul>
 
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Images/Marborough.jpg" class="d-block w-100" alt="Fort Marlborough">
                <div class="carousel-caption">
                    <h2>Fort Marlborough</h2>
                    <p>Benteng peninggalan dari penjajahan Belanda.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Images/ngungup.jpg" class="d-block w-100" alt="Sungai Ngungup">
                <div class="carousel-caption">
                    <h2>Sungai Ngungup</h2>
                    <p>Wisata sungai yang terletak di Bengkulu Tengah.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Images/laguna.png" class="d-block w-100" alt="Pantai Laguna">
                <div class="carousel-caption">
                    <h2>Pantai Laguna</h2>
                    <p>Pantai yang terletak di Kaur, Bengkulu Selatan.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="Images/pantaiPanjang.jpg" class="d-block w-100" alt="Pantai Panjang">
                <div class="carousel-caption">
                    <h2>Pantai Panjang</h2>
                    <p>Pantai yang terletak di Kota Bengkulu.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Section paket wisata -->
    <div class="container mt-5" id="paket_wisata">
        <h2 class="text-center mb-4">Paket Wisata</h2> <!-- Judul Paket Wisata -->
        <div class="row">
            <!-- Card Paket 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="Images/ngungup.jpg" class="card-img-top" alt="Sungai Ngungup">
                    <div class="card-body">
                        <h5 class="card-title">Sungai Ngungup</h5>
                        <p class="card-text">Paket Wisata sungai Ngungup di Bengkulu Tengah</p>
                        <div class="price-tag">Rp. 500.000</div>
                        <a href="#" class="btn btn-primary mt-3">Details</a>
                    </div>
                </div>
            </div>

            <!-- Card Paket 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="Images/laguna.png" class="card-img-top" alt="Pantai Laguna">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Laguna</h5>
                        <p class="card-text">Paket wisata pantai Laguna di Kaur, Bengkulu Selatan.</p>
                        <div class="price-tag">Rp. 150.000</div>
                        <a href="#" class="btn btn-primary mt-3">Details</a>
                    </div>
                </div>
            </div>

            <!-- Card Paket 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="Images/pantaiPanjang.jpg" class="card-img-top" alt="Pantai Panjang">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Panjang</h5>
                        <p class="card-text">Paket wisata pantai panjang Bengkulu</p>
                        <div class="price-tag">Rp. 200.000</div>
                        <a href="#" class="btn btn-primary mt-3">Details</a>
                    </div>
                </div>
            </div>
        </div>

<div class="container mt-5" id="Form_PemesananID">
    <h2 class="text-center mb-4">Form Pemesanan Paket Wisata</h2>
    <form action="create.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Nomer Telp/HP</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="travel_date" class="form-label">Waktu Pelaksanaan Perjalanan</label>
            <input type="date" class="form-control" id="travel_date" name="travel_date" required>
        </div>
        <div class="mb-3">
            <label for="days" class="form-label">Jumlah Hari Perjalanan</label>
            <input type="number" class="form-control" id="days" name="days" required>
        </div>
        <div class="mb-3">
            <label for="participants" class="form-label">Jumlah Peserta</label>
            <input type="number" class="form-control" id="participants" name="participants" required>
        </div>
        <div class="mb-3">
            <label for="services" class="form-label">Pelayanan Paket Perjalanan</label><br>
            <input type="checkbox" name="services[]" value="Penginapan"> Penginapan <br>
            <input type="checkbox" name="services[]" value="Transportasi"> Transportasi <br>
            <input type="checkbox" name="services[]" value="Makanan"> Makanan
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-danger">Batal</a>
    </form>
</div>

        <!-- Embed YouTube Video Preview -->
        <div class="row mt-5">
            <div class="col text-center">
              <h4>Preview Wisata Bengkulu</h4>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/U136nuH0KH8" 
                      title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                      clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
              </iframe>
              
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5" id="Tentang">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h5>Contact Us</h5>
                    <p>Email: info@wonderfullbengkulu.com</p>
                    <p>Phone: +62 123 4567 890</p>
                    <a href="#">Facebook</a> | <a href="#">Instagram</a> | <a href="#">Twitter</a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Detail Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($_GET['name'])): ?>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Pemesan</th>
                                    <td><?= htmlspecialchars($_GET['name']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Telp/HP</th>
                                    <td><?= htmlspecialchars($_GET['phone']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Waktu Pelaksanaan Perjalanan</th>
                                    <td><?= htmlspecialchars($_GET['travel_date']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Hari Perjalanan</th>
                                    <td><?= htmlspecialchars($_GET['days']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Peserta</th>
                                    <td><?= htmlspecialchars($_GET['participants']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pelayanan Paket Perjalanan</th>
                                    <td><?= htmlspecialchars($_GET['services']) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td><?= htmlspecialchars($_GET['total']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Belum ada data pemesanan.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Tampilkan modal jika ada query string
        <?php if (isset($_GET['name'])): ?>
            var orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
            orderModal.show();
        <?php endif; ?>
    </script>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
