<?php
require "session.php";
require "koneksi.php";

$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nott Shop</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Elektronik</h1>
            <h3>Mau Cari Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-3">
                        <input type="text" class="form-control" placeholder="Nama Produk" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn btn-primary warna1">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-keyboard d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Keyboard">Keyboard</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-mouse d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Mouse">Mouse</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-laptop d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Laptop">Laptop</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid warna1 py-5">
        <div class="container text-center">
            <h3 class="text-white">Tentang Kami</h3>
            <p class="fs-5 mt-3 text-white">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt necessitatibus velit voluptates animi expedita, odit reprehenderit, recusandae voluptatum non ratione soluta praesentium, alias fuga eius possimus nesciunt rerum quia iusto quae aspernatur voluptatem! Hic illo aperiam inventore! Quasi iste optio praesentium quaerat porro fugiat, explicabo dolorum at fugit earum rerum ex natus, ipsa officiis sit nam aliquid molestias nesciunt. Necessitatibus, voluptatem inventore. Temporibus velit porro necessitatibus consequuntur ab? Nostrum eum adipisci dolor eaque saepe ducimus deleniti odit nesciunt beatae modi.
            </p>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card h-100 mb-2">
                            <div class="image-box">
                                <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                                <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                <p class="card-text text-harga"><?php echo $data['harga']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="produk.php" class="btn btn-outline-warning mt-3 p-3 fs-3 bg-dark text-white">See More</a>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>