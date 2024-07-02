<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="tabel.php" method="post">
        <label for="Masukkan Jumlah Mahasiswa : "> <input type="number" name="JumlahMahasiswa" placeholder="Jumlah Mahasiswa" require></label>
        <input type="submit" value="Submit">
        <br>
        <br>
    </form>

    <?php
    echo '<form action="tabel.php" method="post">';
    $jumlahMahasiswa = $_POST['JumlahMahasiswa'];
    for($i = 1; $i <= $jumlahMahasiswa; $i++){
        echo '<input type="hidden" name="JumlahMahasiswa" value="' . $jumlahMahasiswa . '">';
            echo '<h3>Mahasiswa ke-' . $i . ':</h3>';

            ?>
            <table>
                <tr>
                    <td><?php      echo '<label for="' . $i . '">Nama : </label>' ?></td>
                    <td><?php  echo '<input name="nama' . $i . '" type="text"  required><br>';?></td>
                </tr>
                <tr>
                    <td><?php echo '<label for="' . $i . '">Umur : </label>' ?></td>
                    <td><?php  echo '<input name="umur' . $i . '" type="number" required><br>'; ?></td>
                </tr>
                <tr>
                    <td><?php  echo '<label for="' . $i . '"> Jenis Kelamin </label>'; ?></td>
                    <td><?php       echo '<input type="text" name="jk' . $i . '"  required><br>'; ?></td>
                </tr>

            </table>
        <br><br>
        <?php
    }
    echo '<input type="submit" value="Kirim">';
    echo '</form>';
    
    ?>

    <table border="2px">
    <tr>
        <td> Nama </td>
        <td> Umur </td>
        <td> Jenis Kelamin </td>
    </tr>
    <?php
    for ($i = 1; $i <= $jumlahMahasiswa; $i++) {
        $nama = $_POST['nama' . $i];
        $umur = $_POST['umur' . $i];
        $jk = $_POST['jk' . $i];
        echo '<tr>';
        echo '<td>' . htmlspecialchars($nama) . '</td>';
        echo '<td>' . htmlspecialchars($umur) . '</td>';
        echo '<td>' . htmlspecialchars($jk) . '</td>';
        echo '</tr>';
    }
    ?>
    </table>
</body>
</html>