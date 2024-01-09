<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitung Pengeluaran Harian</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #006400; /* Warna hijau gelap */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #006400; /* Warna hijau gelap */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #004d00; /* Warna hijau lebih gelap saat hover */
        }

        p {
            color: #ff0000; /* Warna merah */
            margin-top: 8px;
        }

        h3 {
            color: #006400; /* Warna hijau gelap */
        }

        strong {
            color: #006400; /* Warna hijau gelap */
        }
    </style>
</head>
<body>

<h2>Penghitung Pengeluaran Harian</h2>

<?php
// Fungsi untuk menghitung total pengeluaran
function hitungTotalPengeluaran($pengeluaran) {
    $total = 0;
    
    // Menghitung total pengeluaran
    foreach ($pengeluaran as $item) {
        $total += $item;
    }

    return $total;
}

// Struktur kontrol untuk memproses formulir input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memeriksa apakah field input telah diisi dan nilainya valid
    foreach (['transportasi', 'listrik', 'makanan'] as $category) {
        if (isset($_POST[$category]) && is_numeric($_POST[$category]) && $_POST[$category] >= 0) {
            // Menyimpan pengeluaran ke dalam array sesuai kategori
            $pengeluaran_harian[$category] = $_POST[$category];
        } else {
            echo "<p style='color: red;'>Masukkan jumlah pengeluaran $category yang valid.</p>";
        }
    }
}

// Menampilkan formulir input
?>
<form method="post" action="">
    <label for="transportasi">Transportasi (IDR): </label>
    <input type="number" name="transportasi" required><br>

    <label for="listrik">Listrik (IDR): </label>
    <input type="number" name="listrik" required><br>

    <label for="makanan">Makanan (IDR): </label>
    <input type="number" name="makanan" required><br>

    <button type="submit">Tambah Pengeluaran</button>
</form>

<?php
// Menampilkan total pengeluaran
if (!empty($pengeluaran_harian)) {
    echo "<h3>Total Pengeluaran Hari Ini:</h3>";
    echo "<p><strong>IDR " . number_format(hitungTotalPengeluaran($pengeluaran_harian), 2) . "</strong></p>";
}
?>

</body>
</html>
