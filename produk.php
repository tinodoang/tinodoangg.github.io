<?php
require "../koneksi.php";
$keyword = $_GET["keyword"];
$query = "SELECT * FROM produk
            JOIN kategori b ON produk.kategori_id = b.id
            WHERE
            nama LIKE '%$keyword%'
            ";



$produk = mysqli_query($con, $query);
$jumlahProduk = mysqli_num_rows($produk);
?>

<body>
    <div id="container">
        <div class="tble-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($jumlahProduk)) {
                    ?>
                        <tr>
                            <td colspan="6" class="text-center">Data produk tidak tersedia</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        foreach ($produk as $data) {
                        ?>
                            <tr>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><?php echo $data['harga']; ?></td>
                                <td><?php echo $data['ketersediaan_stok']; ?></td>
                                <td>
                                    <a href="../adminpanel/produk-detail.php?id=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                    <?php
                            $jumlah++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>