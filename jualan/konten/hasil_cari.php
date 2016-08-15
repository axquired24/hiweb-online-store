<?php
  $barang_cari = $_POST[barang_cari];
  echo "<p> Menampilkan hasil cari dari <strong>$barang_cari</strong></p> ";

  $sql_barang = "SELECT * FROM produk WHERE nama_produk LIKE '%$barang_cari%'";
  $exe_sql    = mysql_query($sql_barang);
  while($barang=mysql_fetch_array($exe_sql))
  {
    // Tampilkan semua barang
?>
  <div class="col-md-2">
    <strong><?php echo $barang[nama_produk]; ?></strong>
    <a href="./?ur=konten/detail_barang&id_produk=<?php echo $barang[id_produk]; ?>"><img src="<?php echo $barang[gambar_produk]; ?>" title="<?php echo $barang[nama_produk]; ?>" class="img-responsive thumbnail" /></a>
    <button type="button" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Rp <?php echo $barang[harga_produk]; ?></button>
  </div>
<?php
  } // Tutup while
?>
