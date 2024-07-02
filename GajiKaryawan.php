<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="jumlahKaryawan">Masukkan Jumlah Karyawan : </label>
        <input type="number" name="jumlahKaryawan" placeholder="Jumlah Karyawan" required>
        <input type="submit" value="Submit">
        <br>
    </form>

    <?php
    $gajipokok = 3000000;
    $tunjanganistri = 200000;
    $tunjangananak = 100000;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jumlahKaryawan'])) {
        $jumlahKaryawan = $_POST['jumlahKaryawan'];

        echo '<form action="index.php" method="post">';
        echo '<input type="hidden" name="jumlahKaryawan" value="' . $jumlahKaryawan . '">';

        for ($i = 1; $i <= $jumlahKaryawan; $i++) {
            echo '<h3>Karyawan ke-' . $i . ':</h3>';
            echo '<label for="istri' . $i . '">Apakah Anda Sudah Mempunyai istri?</label>';
            echo '<label for="istri' . $i . '">Ya</label><input name="istri' . $i . '" type="radio" value="ya" required>';
            echo '<label for="istri' . $i . '">Tidak</label><input name="istri' . $i . '" type="radio" value="tidak" required><br>';
            echo '<label for="anak' . $i . '">Berapa Jumlah Anak Anda : </label>';
            echo '<input type="number" name="anak' . $i . '" placeholder="Jumlah Anak" required><br>';
        }

        echo '<input type="submit" value="Calculate">';
        echo '</form>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anak1'])) {
        $jumlahKaryawan = $_POST['jumlahKaryawan'];
        $totalGaji = 0;
        $potongan = 0.02;

        for ($i = 1; $i <= $jumlahKaryawan; $i++) {
            $istri = $_POST['istri' . $i];
            $anak = $_POST['anak' . $i];

            $gajiKaryawan = $gajipokok;

            if ($istri == "ya") {
                $gajiKaryawan += $tunjanganistri;
            }

            $gajiKaryawan += $anak * $tunjangananak * $potongan;
            $totalGaji += $gajiKaryawan ;

            echo '<h3>Karyawan ke-' . $i . ':</h3>';
            echo 'Gaji Pokok: Rp ' . number_format($gajipokok, 0, ',', '.') . '<br>';
            echo 'Tunjangan Istri: Rp ' . ($istri == "ya" ? number_format($tunjanganistri, 0, ',', '.') : '0') . '<br>';
            echo 'Tunjangan Anak: Rp ' . number_format($anak * $tunjangananak, 0, ',', '.') . '<br>';
            echo 'Total Gaji: Rp ' . number_format($gajiKaryawan, 0, ',', '.') . '<br>';
        }
        echo '<h3>Total Gaji Semua Karyawan: Rp ' . number_format($totalGaji, 0, ',', '.') . '</h3>';
    }
    ?>
</body>
</html>
