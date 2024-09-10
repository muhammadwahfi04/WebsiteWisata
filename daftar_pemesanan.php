<?php include('db.php'); ?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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


    </style>
    <title>Daftar Pemesanan</title>
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
                    <!-- <li class="nav-item"><a class="nav-link" href="#paket_wisata">Paket Wisata</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="#Form_PemesananID">Pemesanan</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#Tentang">Tentang</a></li> -->
              
                </ul>
 
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Pemesanan</h2>

        <?php
        // Menghandle pembaruan data
        if (isset($_POST['update'])) {
            // Validasi jika form tidak lengkap
            if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['travel_date']) || empty($_POST['participants']) || empty($_POST['services']) || empty($_POST['days'])) {
                echo "<div class='alert alert-danger' role='alert'>Semua field harus diisi!</div>";
            } else {
                $name = $mysqli->real_escape_string($_POST['name']);
                $phone = $mysqli->real_escape_string($_POST['phone']);
                $travel_date = $mysqli->real_escape_string($_POST['travel_date']);
                $participants = intval($_POST['participants']);
                $days = intval($_POST['days']); // Jumlah hari
                $services = $_POST['services']; // array pilihan layanan

                // Harga layanan
                $prices = [
                    'Penginapan' => 1000000,
                    'Transportasi' => 1200000,
                    'Makanan' => 500000
                ];

                // Perhitungan total harga per layanan yang dipilih
                $price_per_person = 0;
                foreach ($services as $service) {
                    if (isset($prices[$service])) {
                        $price_per_person += $prices[$service];
                    }
                }

                // Total = hari x peserta x harga per orang
                $total = $days * $participants * $price_per_person;

                // Gabungkan layanan yang dipilih menjadi string
                $services_string = implode(", ", $services);

                $id = intval($_POST['id']);

                // Update ke database
                $query = "UPDATE db_pemesanan SET name='$name', phone='$phone', travel_date='$travel_date', participants='$participants', services='$services_string', price='$price_per_person', total='$total', days='$days' WHERE id=$id";

                if ($mysqli->query($query)) {
                    echo "<div class='alert alert-success' role='alert'>Data berhasil diperbarui!</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error: " . $mysqli->error . "</div>";
                }
            }
        }

        // Menghandle penghapusan data
        if (isset($_GET['delete_id'])) {
            $delete_id = intval($_GET['delete_id']);
            $mysqli->query("DELETE FROM db_pemesanan WHERE id = $delete_id");
            echo "<div class='alert alert-success' role='alert'>Data berhasil dihapus!</div>";
        }
        ?>

        <!-- Modal untuk Form Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Pemesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <input type="hidden" id="edit-id" name="id">
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="edit-name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-phone" class="form-label">Nomer Telp/HP</label>
                                <input type="text" class="form-control" id="edit-phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-travel_date" class="form-label">Waktu Pelaksanaan</label>
                                <input type="date" class="form-control" id="edit-travel_date" name="travel_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-days" class="form-label">Jumlah Hari</label>
                                <input type="number" class="form-control" id="edit-days" name="days" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-participants" class="form-label">Jumlah Peserta</label>
                                <input type="number" class="form-control" id="edit-participants" name="participants" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pelayanan Paket</label>
                                <?php
                                $available_services = ['Penginapan', 'Transportasi', 'Makanan'];
                                foreach ($available_services as $service) {
                                    echo "<div class='form-check'>
                                            <input type='checkbox' class='form-check-input' id='edit-services-$service' name='services[]' value='$service'>
                                            <label class='form-check-label' for='edit-services-$service'>$service</label>
                                          </div>";
                                }
                                ?>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Pemesanan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Nomer Telp/HP</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Jumlah Hari</th>
                    <th>Jumlah Peserta</th>
                    <th>Pelayanan Paket</th>
                    <th>Harga</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $mysqli->query("SELECT * FROM db_pemesanan");
                while ($row = $result->fetch_assoc()) {
                    $services_array = explode(", ", $row['services']);
                    $services_checked = json_encode($services_array);
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['travel_date']}</td>
                            <td>{$row['days']}</td>
                            <td>{$row['participants']}</td>
                            <td>{$row['services']}</td>
                            <td>Rp. {$row['price']}</td>
                            <td>Rp. {$row['total']}</td>
                            <td>
                                <button class='btn btn-warning edit-btn' 
                                        data-id='{$row['id']}'
                                        data-name='{$row['name']}'
                                        data-phone='{$row['phone']}'
                                        data-travel_date='{$row['travel_date']}'
                                        data-days='{$row['days']}'
                                        data-participants='{$row['participants']}'
                                        data-services='{$services_checked}'
                                        data-bs-toggle='modal' data-bs-target='#editModal'>
                                    Edit
                                </button>
                                <a href='?delete_id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const phone = this.getAttribute('data-phone');
                const travel_date = this.getAttribute('data-travel_date');
                const days = this.getAttribute('data-days');
                const participants = this.getAttribute('data-participants');
                const services = JSON.parse(this.getAttribute('data-services'));

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-phone').value = phone;
                document.getElementById('edit-travel_date').value = travel_date;
                document.getElementById('edit-days').value = days;
                document.getElementById('edit-participants').value = participants;

                // Reset all service checkboxes
                document.querySelectorAll('[id^="edit-services-"]').forEach(checkbox => {
                    checkbox.checked = services.includes(checkbox.value);
                });
            });
        });
    </script>
</body>
</html>
