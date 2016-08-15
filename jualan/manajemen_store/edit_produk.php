<?php
	// Edit Produk Action
	if(isset($_POST[namaproduk]))
	{
		$idproduk 		= $_GET[idproduk];
		$namaproduk 	= $_POST[namaproduk];
		$hargaproduk 	= $_POST[hargaproduk];
		$urlgambar 		= $_POST[urlgambar];
		$kategoriproduk	= $_POST[kategoriproduk];

		$sqlupdate 		= "UPDATE produk SET 
								  nama_produk 		= '" .$namaproduk. "',
								  harga_produk		= '" .$hargaproduk. "',
								  kategori_produk	= '" .$kategoriproduk. "',
								  gambar_produk		= '" .$urlgambar. "' 
								  WHERE id_produk 	= " .$idproduk. "
						  ";
		$exeupdate 		= mysql_query($sqlupdate) OR DIE(mysql_error());
		echo "<script> alert('Update sukses')</script>";
		header('location: ./?ur=manajemen_store/manajemen_produk');
	}

	// Daftar Produk
	$idproduk = $_GET[idproduk];
	$sql = "SELECT produk.*, all_kategori.nama_kategori FROM produk INNER JOIN all_kategori ON produk.kategori_produk=all_kategori.id_kategori WHERE produk.id_produk=$idproduk";
	$exe = mysql_query($sql);
	while($produk=mysql_fetch_array($exe))
	{
		// Keluarin isi tabel disini				
?>

<form class="form-horizontal" action="./?ur=manajemen_store/edit_produk&idproduk=<?php echo $idproduk; ?>" method="post">
	<fieldset>

	<!-- Form Name -->
	<legend>Edit Produk</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namaproduk">Nama Produk</label>  
	  <div class="col-md-4">
	  <input id="namaproduk" name="namaproduk" type="text" placeholder="Isi Nama Produk" class="form-control input-md" required="" value="<?php echo $produk[nama_produk]; ?>">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="hargaproduk">Harga Produk</label>  
	  <div class="col-md-4">
	  <input id="hargaproduk" name="hargaproduk" type="text" placeholder="Isi harga produk" class="form-control input-md" required="" value="<?php echo $produk[harga_produk]; ?>">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="urlgambar">URL Gambar</label>  
	  <div class="col-md-4">
	  <input id="urlgambar" name="urlgambar" type="text" placeholder="Isi URL Gambar" class="form-control input-md" required="" value="<?php echo $produk[gambar_produk]; ?>">
	    
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="kategoriproduk">Kategori Produk</label>
	  <div class="col-md-4">
	    <select id="kategoriproduk" name="kategoriproduk" class="form-control">
	      <option value="<?php echo $produk[kategori_produk]; ?>"><?php echo $produk[nama_kategori]; ?></option>
	      <?php 
	      	$kategori = "SELECT * FROM all_kategori WHERE id_kategori != $produk[kategori_produk]";
	      	$exe_kat  = mysql_query($kategori);
	      	while($namakat=mysql_fetch_array($exe_kat))
	      	{
	      		// Nama - nama kategori			      	
	      ?>
	      <option value="<?php echo $namakat[id_kategori]; ?>"><?php echo $namakat[nama_kategori]; ?></option>
	      <?php 
	      	}; // Tutup while namakat
	      ?>
	    </select>
	  </div>
	</div>

	<!-- Button (Double) -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-8">
	    <button id="submit" name="submit" class="btn btn-primary">Simpan</button>
	    <button id="reset" name="reset" class="btn btn-default">Cancel</button>
	  </div>
	</div>

	</fieldset>			
</form>

<?php 
	}; // Tutupnya while
?>