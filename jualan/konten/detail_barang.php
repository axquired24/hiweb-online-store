<?php
  $id_produk  = $_GET[id_produk];
  $sql_detail = "SELECT * FROM produk WHERE id_produk='$id_produk'";
  $exe_detail = mysql_query($sql_detail);
  $detail     = mysql_fetch_array($exe_detail);
?>
<style>
  .detailproduk h2 {
    padding-top: 0;
    margin-top: 0;
  }
</style>
<div class="detailproduk">
  <div class="row">
      <h2 class="text-primary text-center"><?php echo $detail[nama_produk]; ?></h2>
  </div> <!-- .row -->
  <div class="row">
    <div class="col-md-6">
      <br>
      <div class="thumbnail">
        <img style="max-height:400px; padding:10px;" src="<?php echo $detail[gambar_produk]; ?>" alt="<?php echo $detail[nama_produk]; ?>">
        <div class="caption">
          <h3>Rp. <?php echo $detail[harga_produk]; ?> ,-</h3>
          <p>Note: Harga Berubah sewaktu - waktu.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <p><h3>READY STOCK All Size </h3>
          Harga yang tertera merupakan harga per 1 item.
          <br /><br />
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit dolor, distinctio praesentium repudiandae fugit cum accusamus? Suscipit incidunt eius, non rem doloremque neque dignissimos quibusdam unde amet, est minima blanditiis.
          <br /><br />
          CANTUMKAN NOMOR ITEM YANG DIINGINKAN DI KETERANGAN SAAT PEMESANAN. TANPA KETERANGAN NOMOR ITEM AKAN DIKIRIM SECARA RANDOM
          <br /><br />
          <div class="well">
            Bingung transaksi via Tokopedia? Pengen transfer langsung aja? Silahkan PM, kami akan kasih kontak Whatsapp/LINE kami CP. 089631446027
          </div>

          <div align="center">
            <div class="btn-group">
              <button class="btn btn-default"> <span class="glyphicon glyphicon-star"></span> &nbsp; Tambah ke wishlist</button>
              <button class="btn btn-danger"> <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp; Beli</button>
            </div>
          </div>
      </p>
    </div>
  </div> <!-- .row -->

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tr>
          <td><span class="glyphicon glyphicon-eye-open"></span> Dilihat sebanyak : <span class="pull-right">400x</span></td>
          <td><span class="glyphicon glyphicon-gift"></span> Berat : <span class="pull-right">10Kg</span></td>
        </tr>
        <tr>
          <td>Terjual : <span class="pull-right">2pcs</span></td>
          <td>Asuransi : <span class="pull-right">Adira</span></td>
        </tr>
        <tr>
          <td>Kondisi : <span class="pull-right">Baru</span></td>
          <td><span class="glyphicon glyphicon-shopping-cart"></span> Pemesanan Min. : <span class="pull-right">2</span></td>
        </tr>          
      </table>      
    </div>    
  </div>
</div>