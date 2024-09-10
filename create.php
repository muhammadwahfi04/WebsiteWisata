<?php
include('db.php');

// Fungsi untuk validasi input form
function validateInput($data) {
    return !empty($data['name']) && !empty($data['phone']) && !empty($data['travel_date']) && !empty($data['participants']) && !empty($data['services']) && !empty($data['days']);
}

// Fungsi untuk menghitung total harga
function calculateTotalPrice($services, $prices, $days, $participants) {
    $price_per_person = 0;
    foreach ($services as $service) {
        if (isset($prices[$service])) {
            $price_per_person += $prices[$service];
        }
    }
    return $days * $participants * $price_per_person;
}

// Fungsi untuk menyimpan data ke database
function saveBooking($mysqli, $name, $phone, $travel_date, $participants, $services_string, $price_per_person, $total, $days) {
    $query = "INSERT INTO db_pemesanan (name, phone, travel_date, participants, services, price, total, days) 
              VALUES ('$name', '$phone', '$travel_date', '$participants', '$services_string', '$price_per_person', '$total', '$days')";
    
    return $mysqli->query($query);
}

// Fungsi utama untuk menangani form submission
function handleFormSubmission($mysqli) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!validateInput($_POST)) {
            echo "Semua field harus diisi!";
            return;
        }

        $name = $mysqli->real_escape_string($_POST['name']);
        $phone = $mysqli->real_escape_string($_POST['phone']);
        $travel_date = $mysqli->real_escape_string($_POST['travel_date']);
        $participants = intval($_POST['participants']);
        $days = intval($_POST['days']);
        $services = $_POST['services'];

        $prices = [
            'Penginapan' => 1000000,
            'Transportasi' => 1200000,
            'Makanan' => 500000
        ];

        $total = calculateTotalPrice($services, $prices, $days, $participants);

        $services_string = implode(", ", $services);
        $price_per_person = calculateTotalPrice($services, $prices, 1, 1); // Menghitung harga per orang

        if (saveBooking($mysqli, $name, $phone, $travel_date, $participants, $services_string, $price_per_person, $total, $days)) {
            header("Location: index.php?name=" . urlencode($name) . "&phone=" . urlencode($phone) . "&travel_date=" . urlencode($travel_date) . "&days=" . urlencode($days) . "&participants=" . urlencode($participants) . "&services=" . urlencode($services_string) . "&total=" . urlencode($total));
            exit;
        } else {
            echo "Error: " . $mysqli->error;
        }
    }
}

// Panggil fungsi untuk menangani form submission
handleFormSubmission($mysqli);
?>
