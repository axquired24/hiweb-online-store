<?php
	// Tambah Produk Action
	if(isset($_POST[namaproduk]))
	{
		$namaproduk 	= $_POST[namaproduk];
		$hargaproduk 	= $_POST[hargaproduk];
		$urlgambar 		= $_POST[urlgambar];
		$kategoriproduk	= $_POST[kategoriproduk];

		$sqladd 		= "INSERT INTO produk VALUES (
								  NULL,
								  '" .$namaproduk. "',
								  '" .$hargaproduk. "',
								  '" .$kategoriproduk. "',
								  '" .$urlgambar. "' 
								  )
						  ";
		$exeadd 		= mysql_query($sqladd) OR DIE(mysql_error());
		echo "<script> alert('Tambah produk sukses')</script>";
		header('location: ./?ur=manajemen_store/manajemen_produk');
	}			
?>

<form class="form-horizontal" action="./?ur=manajemen_store/tambah_produk" method="post">
	<fieldset>

	<!-- Form Name -->
	<legend>Tambah Produk</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="namaproduk">Nama Produk</label>  
	  <div class="col-md-4">
	  <input id="namaproduk" name="namaproduk" type="text" placeholder="Isi Nama Produk" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="hargaproduk">Harga Produk</label>  
	  <div class="col-md-4">
	  <input id="hargaproduk" name="hargaproduk" type="text" placeholder="Isi harga produk" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="urlgambar">URL Gambar</label>  
	  <div class="col-md-4">
	  <input id="urlgambar" name="urlgambar" type="text" placeholder="Isi URL Gambar" class="form-control input-md" required="">
	    
	  </div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="kategoriproduk">Kategori Produk</label>
	  <div class="col-md-4">
	    <select id="kategoriproduk" name="kategoriproduk" class="form-control">
	      <?php 
	      	$kategori = "SELECT * FROM all_kategori";
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