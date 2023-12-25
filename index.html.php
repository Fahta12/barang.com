<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keranjang Belanja</title>
</head>
<body>
    <h2>Form Keranjang Belanja</h2>
    <form method="post" action="">
        <label for="kode_barang">Pilih Kode Barang:</label>
        <select name="kode_barang" required>
            <option value="BRG001">BRG001 - Topi</option>
            <option value="BRG002">BRG002 - T-shirt</option>
            <option value="BRG003">BRG003 - Jeans</option>
            <!-- Tambahkan opsi barang lain sesuai kebutuhan -->
        </select>
        <br>
        <label for="jumlah_beli">Jumlah Beli:</label>
        <input type="number" name="jumlah_beli" required>
        <br>
        <input type="submit" name="submit" value="Tambahkan ke Keranjang">
    </form>

    <?php
    // Daftar barang beserta harga dan gambar
    $daftar_barang = array(
        "BRG001" => array("nama" => "Topi", "harga" => 15000, "gambar" => "topi.jpg"),
        "BRG002" => array("nama" => "T-shirt", "harga" => 96000, "gambar" => "tshirt.jpg"),
        "BRG003" => array("nama" => "Jeans", "harga" => 320000, "gambar" => "jeans.jpg"),
        "BRG004" => array("nama" => "Sandal", "harga" => 50000, "gambar" => "sandal.jpg"),
        "BRG005" => array("nama" => "Jam Tangan", "harga" => 200000, "gambar" => "jam_tangan.jpg"),
        // Tambahkan barang lain sesuai kebutuhan
    );

    if(isset($_POST['submit'])){
        // Ambil data dari form
        $kode_barang = $_POST['kode_barang'];
        $jumlah_beli = $_POST['jumlah_beli'];

        // Validasi kode barang
        if(array_key_exists($kode_barang, $daftar_barang)){
            // Hitung total per barang
            $harga_satuan = $daftar_barang[$kode_barang]['harga'];
            $total_per_barang = $jumlah_beli * $harga_satuan;

            // Tampilkan hasil transaksi
            echo "<h2>Hasil Transaksi</h2>";
            echo "Kode Barang: $kode_barang<br>";
            echo "Nama Barang: {$daftar_barang[$kode_barang]['nama']}<br>";
            echo "Jumlah: $jumlah_beli<br>";
            echo "Harga Satuan: Rp " . number_format($harga_satuan, 0, ",", ".") . "<br>";
            echo "Total per Barang: Rp " . number_format($total_per_barang, 0, ",", ".") . "<br>";

            // Tampilkan gambar
            echo "<img src='{$daftar_barang[$kode_barang]['gambar']}' alt='{$daftar_barang[$kode_barang]['nama']}' style='max-width: 200px;'><br>";

            // Hitung total belanja
            $total_belanja = $total_per_barang;
            if($total_belanja > 500000){
                $diskon = 0.05 * $total_belanja;
                $total_belanja -= $diskon;
                echo "Diskon (5%): Rp " . number_format($diskon, 0, ",", ".") . "<br>";
            }

            echo "<b>Total yang Harus Dibayar: Rp " . number_format($total_belanja, 0, ",", ".") . "</b>";
        } else {
            echo "<p style='color: red;'>Kode Barang tidak valid!</p>";
        }
    }
    ?>
</body>
</html>
