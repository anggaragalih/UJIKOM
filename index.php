<?php
   include 'db.php';
   $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
   $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html PUBLIC>
<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>web.galleryfoto</title>
          <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
          <header>
                    <div class="container">
                    <h1><a href="index.php">WEB GALLERY FOTO</a></h1>
                    <ul>
                              <li><a href="galeri.php">Galeri</a></li>
                              <li><a href="registrasi.php">Registrasi</a></li>
                              <li><a href="login.php">Login</a></li>
                    </ul>
                    </div>
          </header>

          <div class="search">
                    <div class="container">
                              <form action="galeri.php">
                                        <input type="text" name="search" placeholder="Cari Foto" />
                                        <input type="submit" name="cari" value="Cari Foto" />
                              </form>
                    </div>
          </div>

          <div class="section">
                    <duv class="container">
                              <h3>Kategori</h3>
                              <div class="box">
                                        <?php
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                            if(mysqli_num_rows($kategori) > 0){
                                                  while($k = mysqli_fetch_array($kategori)){
                                        ?>
                              <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                                        <div class="col-5">
                                           <img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;" />
                                           <p><?php echo $k['category_name'] ?></p>
                                        </div>
                              </a>
                              <?php }}else{ ?>
                                        <p>kategori tidak ada</p>
                                 <?php } ?>
                              </div>
                    </duv>
          </div>

          <div class="container">
                    <h3>Foto Terbaru</h3>
                    <div class="box">
                              <?php
                                 $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
                                 if(mysqli_num_rows($foto) > 0){
                                        while($p = mysqli_fetch_array($foto)){
                              ?>
                              <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                              <div class="col-4">
                                        <img src="foto/<?php echo $p['image'] ?>" height="150px" />
                                        <p class="nama"><?php echo substr($p['image_name'], 0, 30) ?></p>
                                        <P class="admin">Nama User : <?php echo $p['admin_name'] ?></P>
                                        <p class="nama"><?php echo $p['date_created'] ?></p>
                              </div>
                    </a>
                    <?php }}else{ ?>
                       <p>foto tidak ada</p>
                    <?php } ?>
                    </div>
          </div>

          <footer>
                    <div class="container">
                              <small> Copyright &copy; Ujikom RPL STEKMAN. </small>
                    </div>
          </footer>
</body>
</html>