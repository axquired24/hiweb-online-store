<?php 
  $id_produk  = $_GET[id_produk];
  $sql_detail = "SELECT * FROM produk WHERE id_produk='$id_produk'";
  $exe_detail = mysql_query($sql_detail);
  $detail     = mysql_fetch_array($exe_detail);
?>
<div class="row">
  <div class="col-md-8">
  <h3 class="text-primary"><?php echo $detail[nama_produk]; ?> <br /><small>Transaksi sukses semua 100%</small>
    <div class="btn-group pull-right" role="group">
      <button type="button" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Beli Produk</button>
      <button type="button" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-heart"></span> Tambah ke wishlist</button>                    
    </div> <!-- btn-group -->     
    <br><br>
  </h3>
  <hr>
  </div> <!-- md-8 -->  
</div> <!-- row awal -->
  
<div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $detail[gambar_produk]; ?>" alt="<?php echo $detail[nama_produk]; ?>">
      <div class="caption">
        <h3>Rp. <?php echo $detail[harga_produk]; ?> ,-</h3>
        <p>Note: Harga Berubah sewaktu - waktu.</p>            
      </div>
    </div>      
  </div> <!-- <div class="col-md-4"> -->
  
  <div class="col-md-4">
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
    
    <p>READY STOCK SEMUA NOMOR 
        <br /><br />
        Harga yang tertera merupakan harga per 1 item.
        <br /><br />
        Cord holder atau cable winder sangat membantu untuk merapikan kabel yang berantakan.
        Material berupa karet PVC.
        <br /><br />
        CANTUMKAN NOMOR ITEM YANG DIINGINKAN DI KETERANGAN SAAT PEMESANAN. TANPA KETERANGAN NOMOR ITEM AKAN DIKIRIM SECARA RANDOM
        <br /><br />
        Bingung transaksi via Tokopedia? Pengen transfer langsung aja? Silahkan PM, kami akan kasih kontak Whatsapp/LINE kami
        CP. 089631446027
    </p>
    
  </div> <!-- <div class="col-md-8"> -->
</div> <!-- row kedua -->