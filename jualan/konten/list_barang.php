<div class="row">
<?php
  $sql_barang = "SELECT * FROM produk";
  $exe_sql    = mysql_query($sql_barang);
  while($barang=mysql_fetch_array($exe_sql))
  {
    // Tampilkan semua barang
?>
  <div class="col-md-3">
    <div class="thumbnail">
      <a href="./?ur=konten/detail_barang&id_produk=<?php echo $barang[id_produk]; ?>">
        <img src="<?php echo $barang[gambar_produk]; ?>" title="<?php echo $barang[nama_produk]; ?>" class="img-responsive" />
      </a>
      <strong>Rp <?php echo $barang[harga_produk]; ?></strong>
      <br>
      <?php echo $barang[nama_produk]; ?>
      <br><br>
      <div class="text-center">
        <div class="btn-group">
          <a href="#" class="btn btn-danger">
            <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Beli
          </a>
          <a href="./?ur=konten/detail_barang&id_produk=<?php echo $barang[id_produk]; ?>" title="Detail Produk" class="btn btn-default">
            <span class="glyphicon glyphicon-chevron-right"></span> &nbsp;
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
  } // Tutup while
?>
</div>