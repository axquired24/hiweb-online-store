# HIWEB TUTORIAL
## Basic CRUD & Dynamic Page
### (Online Store Batik)

![Screenshot](https://raw.githubusercontent.com/axquired24/hiweb-online-store/readme-asset/jualanbatik.jpg)

- [Pendahuluan](#pendahuluan)
    - [Spesifikasi Sistem](#spesifikasi)
- [Membuat Database](#membuat-database)
    - [Tabel Produk](#tb-produk)
    - [Tabel Kategori](#tb-kategori)
- [Koneksi Database](#koneksi-database)
- [Membuat Layout](#membuat-layout)
	- [Layout Dasar Halaman](#layout-dasar)
	- [Menu Navigasi](#menu-navigasi)
	- [Halaman Dinamis](#halaman-dinamis)
- [Membuat Konten](#membuat-konten)
	- [Halaman Awal](#halaman-awal)
	- [Daftar Produk](#daftar-produk)
	- [Detail Produk](#detail-produk)
	- [Pencarian Produk](#pencarian-produk)
- [CRUD Manajemen Produk](#manajemen-produk)
	- [Tabel Daftar Produk](#tabel-daftar-produk)
	- [Hapus Produk](#hapus-produk)
	- [Tambah Produk](#tambah-produk)
	- [Edit Produk](#edit-produk)
- [Penutup](#penutup)
	- [Lihat di github](#github)
	- [Penulis](#penulis)

<a name="pendahuluan"></a>
## Pendahuluan

Tutorial ini berisi tentang pembuatan dasar halaman dinamis (Dynamic Page) dan Dasar CRUD (Create, Read, Update, Delete) menggunakan PHP dan Database MySQL. Untuk mempercantik tampilan pada website ini, akan kita gunakan CSS Framework yaitu Bootstrap Versi 3. Namun pada tutorial kali ini, penjelasan hanya berfokus kepada kode PHP dan MySQL sedangkan untuk Bootstrap akan saya lewati. Tutorial Bootstrap dapat dilihat di `w3scholl` atau di website resminya [getbootstrap.com](http://getbootstrap.com).
Aplikasi lengkap dapat dilihat di [github](http://github.com/axquired24)

<a name="spesifikasi"></a>
### Spesifikasi Sistem

Sistem ini dibuat dengan :
- JQuery
- Bootstrap
- PHP 5
- MySQL

Untuk memulai project ini, seblumnya siapkan dulu file berikut ini:
- /Server-Root
	- /bs3_dist
		- /css
			- bootstrap.min.css
		- /fonts
			- glyphicons-halflings-regular.eot
			- glyphicons-halflings-regular.svg
			- glyphicons-halflings-regular.ttf
			- glyphicons-halflings-regular.woff
		- /js
			- bootstrap.min.js
			- jquery.js
	- /jualan

Semua aset untuk website ini akan diletakkan dalam folder `/bs3_dist` yang bisa di download dari website resminya [getbootstrap.com](http://getbootstrap.com) dan jquery.js dari website resmi jquery pula. Untuk mempermudah, semua file tersebut juga sudah ada di [github](http://github.com/axquired24) saya.

Folder `/jualan` akan berisi file website kita yang akan kita buat semua dari awal.

Contoh gambar dari website ini adalah `/jualan/baju-batik.jpg` yang dapat diambil dari [github](http://github.com/axquired24).

<a name="membuat-database"></a>
## Membuat Database

Setelah menyiapkan aset css dan javascript, selanjutnya kita buat database dengan nama `jualan` lalu buat dua tabel dengan nama `produk` dan `all_kategori`.

<a name="tb-produk"></a>
### Tabel Produk

Struktur tabel `produk` adalah sebagai berikut:

	--
	-- Table structure for table `produk`
	--

	CREATE TABLE IF NOT EXISTS `produk` (
	  `id_produk` int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	  `nama_produk` varchar(50) NOT NULL,
	  `harga_produk` varchar(10) NOT NULL,
	  `kategori_produk` int(5) NOT NULL,
	  `gambar_produk` text NOT NULL
	);

Kemudian isi dengan data sample :

	--
	-- Dumping data for table `produk`
	--
	INSERT INTO `produk`
	(`id_produk`, `nama_produk`, `harga_produk`, `kategori_produk`, `gambar_produk`)
	VALUES
	(1, 'Batik Merah Pink', '28000', 3, 'baju-batik.jpg'),
	(2, 'Batik Biru', '45000', 1, 'baju-batik.jpg'),
	(3, 'Batik Putih', '100000', 1, 'baju-batik.jpg'),
	(5, 'Batik Kuhued', '29000', 6, 'baju-batik.jpg');
	-- --------------------------------------------------------

<a name="tb-kategori"></a>
### Tabel Kategori

Struktur tabel `all_kategori` :

	--
	-- Table structure for table `all_kategori`
	--

	CREATE TABLE IF NOT EXISTS `all_kategori` (
	  `id_kategori` int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	  `nama_kategori` varchar(50) NOT NULL
	);

Kemudian isi juga data sample-nya :

	--
	-- Dumping data for table `all_kategori`
	--
	INSERT INTO `all_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Baju Batik Solo'),
	(2, 'Batik Lampung '),
	(3, 'Batik Asam Manis'),
	(4, 'Batik Aceh'),
	(5, 'Batik FKIP'),
	(6, 'Batik Polosan'),
	(7, 'Batik Aksara Lampung'),
	(8, 'Batik Mahalan - Branded');
	-- --------------------------------------------------------

<a name="koneksi-database"></a>
## Koneksi Database

Buat file untuk koneksi antara php dengan database yang telah kita buat di `/jualan/koneksi.php` :

	<?php
		$host = "localhost"; 	// Nama Host
		$user = "root";      	// Username MySQL, default 'root'
		$pass = "root"; 		// Password MySQL, default ''
		$dbn  = "jualan";		// Nama Database

		mysql_connect($host,$user,$pass); 	// Fungsi Koneksi
		mysql_select_db($dbn);				// Fungsi Pilih Database
	?>

<a name="membuat-layout"></a>
## Membuat Layout

Layout adalah tampilan inti dari website yang memudahkan kita dalam mendesain halaman web, dengan ini kita tidak perlu melakukan edit satu per satu file untuk tiap tampilan, hanya konten yang akan berubah sedangkan layout tetap.

<a name="layout-dasar"></a>
### Layout Dasar Halaman

Layout dasar pada website ini berada di `/jualan/index.php` sebagai berikut:

	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8" />
	  <title>Jualan Batik Alfatih24</title>

	  <!-- Link CSS Bootstrap -->
	  <link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css" />
	</head>
	<!-- CSS untuk Footer Halaman -->
	<style>
	  body {
	    margin-bottom: 60px;
	  }

	  .footer {
	    font-weight: bold;
	    position: fixed;
	    left: 50%;
	    bottom: 0;
	    margin-bottom: 20px;
	    padding: 5px;
	    border-radius: 5px;
	    background-color: #F1F0F0;
	  }
	</style>
	<body>
	  <div class="container">
	    <div class="row">
	      <h2 class="page-header">Jualan Batik <!-- Brand Menu -->
	        <div class="col-lg-6 pull-right">
	          <!-- Form Pencarian Produk -->
	          <form action="./?ur=konten/hasil_cari" method="post">
	            <div class="input-group">
	              <input name="barang_cari" type="text" class="form-control" placeholder="Cari produk disini" required>
	              <span class="input-group-btn">
	                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp; Cari</button>
	              </span>
	            </div><!-- /input-group -->
	            </form>
	            <!-- END Form Pencarian Produk -->
	          </div><!-- /.col-lg-6 -->
	      </h2>
	    </div>
	  </div>

	  <!-- Bagian Konten -->
	  <div class="container">
	    <div class="row">
	      <div class="col-md-4">
	        <?php
	          // Mencegah Error Notice PHP Development
	          error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	          // Menyisipkan File Koneksi
	          include "koneksi.php";
	          // Menyisipkan File Navigasi Kiri
	          include "navmenu.php";
	         // Buat Menu
	        ?>
	      </div>
	      <div class="col-md-8">
	        <?php
	           // Halaman Dinamis
	           // Sisipkan Konten dari Alamat di URL
	           // Contoh URL : index.php?ur=konten/home
	           // Berarti : Mengambil file di folder konten/ dengan nama home.php
	          $file = $_GET[ur]; 	// Ambil variable ur= di url
	          if(! isset($file))	// Jika variable kosong
	          {
	            include "konten/home.php";  // Sisipkan file konten/home.php
	          }
	          else          				// Selain itu
	          {
	            include $file.".php"; 		// Sisipkan isi variable ur= *.php
	          }
	        ?>
	      </div>
	    </div>
	  </div>
	  <!-- Footer Halaman -->
	  <div class="footer"> &copy; <?php echo date('Y'); ?> - Jualan Batik Alfatih24</div>
	</body>
	</html>

<a name="menu-navigasi"></a>
### Menu Navigasi

Menu Navigasi sebelah kiri berada pada layout, tetapi dengan cara disisipkan dari file aslinya yang berada di `/jualan/navmenu.php` yang isinya :

	<?php
		// Variable Dinamic URL
		  $list_barang  = "ur=konten/list_barang";
		  $detail_barang = "ur=konten/detail_barang";
		  $manajemen_produk = "ur=manajemen_store/manajemen_produk";
	?>
	<!-- Setiap href="url" dibawah ini, menggunakan dinamic url yang nama foldernya berada pada variable Dinamic URL diatas -->
	<h3 class="page-header">
		Main Menu
		<span class="glyphicon glyphicon-th-list pull-right"></span>
	</h3>
	<ul class="nav nav-pills nav-stacked">
	  <li role="presentation">
	  	<a href="./">
	  		<span class="glyphicon glyphicon-home"></span> &nbsp; Home
	  	</a>
	  </li>
	  <li role="presentation">
	  	<a href="./?<?php echo $list_barang; ?>">
	  		<span class="glyphicon glyphicon-pencil"></span>&nbsp;  List Barang
	  	</a>
	  </li>
	  <li role="presentation">
	  	<a href="./?<?php echo $manajemen_produk; ?>">
	  		<span class="glyphicon glyphicon-cog"></span>&nbsp; Manajemen Produk
	  	</a>
	  </li>
	</ul>

<a name="halaman-dinamis"></a>
### Halaman Dinamis

Halaman dinamis adalah halaman yang di-generate secara otomatis oleh php menggunakan path dari file tersebut ataupun fungsi php lainnya. Fungsi halaman dinamis pada website ini menggunakan path (letak folder) dari file .php, berada pada layout `jualan/index.php` :

    <?php
       // Halaman Dinamis
       // Sisipkan Konten dari Alamat di URL
       // Contoh URL : index.php?ur=konten/home
       // Berarti : Mengambil file di folder konten/ dengan nama home.php
      $file = $_GET[ur]; 	// Ambil variable ur= di url
      if(! isset($file))	// Jika variable kosong
      {
        include "konten/home.php";  // Sisipkan file konten/home.php
      }
      else          				// Selain itu
      {
        include $file.".php"; 		// Sisipkan isi variable ur= *.php
      }
    ?>

<a name="membuat-konten"></a>
## Membuat Konten

Konten pada website ini berasal dari file *.php yang lokasinya di-generate melalui variable di URL setiap halaman. Ini memudahkan kita untuk berganti halaman tanpa harus manual `include` setiap path nya.

<a name="halaman-awal"></a>
### Halaman Awal

Halaman selamat datang dibuat untuk eye-catch pengunjung dari website. Biasanya tidak terlalu panjang, untuk website online store biasanya berisi link menuju daftar produk, promo ataupun penawaran menarik.

File halaman awal website ini berada pada `jualan/konten/home.php`, buat file baru dan isikan dengan kode berikut

	<div class="jumbotron">
	  <h1>Selamat Datang!</h1>
	  <p>Kami menyediakan beragam jenis batik dari seluruh wilayah Indonesia yang terjamin kualitas dan harganya.</p>
	  <p>
	  	<!-- Variable $list_barang sudah di include pada navmenu.php sehingga dapat dipanggil kapan saja -->
	  	<a class="btn btn-danger btn-lg" href="./?<?php echo $list_barang; ?>" role="button">Mulai Belanja!</a>
	  </p>
	</div>

Pada file diatas terdapat kode `href="./?<?php echo $list_barang; ?>"` yang mengambil variable dari `navmenu.php` yakni

	$list_barang  = "ur=konten/list_barang";

Sehingga dalam HTML akan menjadi

	href="./?ur=konten/list_barang"

Yang artinya akan menuju halaman lain yang mengambil file dari folder `konten/list_barang` berekstensi `.php`

<a name="daftar-produk"></a>
### Daftar Produk

Fitur Utama dari setiap Online-Store, menampilkan produk beserta gambar, harga dan link menuju detail deskripsi produk.

Untuk membuat daftar produk, buat file `/jualan/konten/list_barang.php` berisi :

	<div class="row">
	<?php
	  // Pilih semua produk dari tabel produk
	  $sql_barang = "SELECT * FROM produk";
	  $exe_sql    = mysql_query($sql_barang);
	  while($barang=mysql_fetch_array($exe_sql))
	  {
	    // Tampilkan semua barang yang ditemukan satu per-satu
	    // Dengan perulangan
	    // Menampilkan barang dengan echo $barang[nama-kolom-tabel]
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

<a name="detail-produk"></a>
### Detail Produk

Detail barang menampilkan informasi yang lebih lengkap dari suatu produk, ditampilkan dengan membuat file `/jualan/konten/detail_barang.php` :

	<?php
	  // $id_produk diambil dari url ?ur=link&id_produk=2 yang berasal dari Daftar produk
	  $id_produk  = $_GET[id_produk];

	  // Cari produk dengan id_tersebut, tampilkan semua detailnya
	  $sql_detail = "SELECT * FROM produk WHERE id_produk='$id_produk'";
	  $exe_detail = mysql_query($sql_detail);

	  $detail     = mysql_fetch_array($exe_detail);
	  // Menampilkan produk dengan $detail[nama-kolom-tabel]
	?>
	<!-- CSS untuk tampilan judul produk -->
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

<a name="pencarian-produk"></a>
### Pencarian Produk

Tampilan ini digunakan untuk menampilkan hasil pencarian dari **Form Cari** yang ada di Brand Menu. Perhatikan kode ini dalam file `/jualan/index.php` :

	<!-- Form Pencarian Produk -->
	<form action="./?ur=konten/hasil_cari" method="post">
	<div class="input-group">
	  <input name="barang_cari" type="text" class="form-control" placeholder="Cari produk disini" required>
	  <span class="input-group-btn">
	    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp; Cari</button>
	  </span>
	</div><!-- /input-group -->
	</form>

Form tersebut memiliki `action="./?ur=konten/hasil_cari"` yang artinya hasil post dari form ini akan diteruskan ke file `/jualan/konten/hasil_cari.php`, sehingga kita isi file tersebut dengan :

	<?php
	  // $_POST[barang_cari] artinya berasal dari Form dengan method="post"
	  // dalam field <input> dengan name="barang_cari"
	  $barang_cari = $_POST[barang_cari];
	  echo "<p> Menampilkan hasil cari dari <strong>$barang_cari</strong></p> ";

	  // Mencari dari tabel produk,
	  // dimana kolom_produk mirip dengan karakter dari $barang_cari
	  $sql_barang = "SELECT * FROM produk WHERE nama_produk LIKE '%$barang_cari%'";
	  $exe_sql    = mysql_query($sql_barang);

	  // Akan mengembalikan output berupa list
	  // dari semua produk yang mirip
	  while($barang=mysql_fetch_array($exe_sql))
	  {
	    // Tampilkan semua produk yang mirip pencarian
	?>
	  <div class="col-md-2">
	    <strong><?php echo $barang[nama_produk]; ?></strong>
	    <a href="./?ur=konten/detail_barang&id_produk=<?php echo $barang[id_produk]; ?>"><img src="<?php echo $barang[gambar_produk]; ?>" title="<?php echo $barang[nama_produk]; ?>" class="img-responsive thumbnail" /></a>
	    <button type="button" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Rp <?php echo $barang[harga_produk]; ?></button>
	  </div>
	<?php
	  } // Tutup while
	  // Jika tidak ditemukan, maka tampilan akan kosong
	?>

<a name="manajemen-produk"></a>
## Manajemen Produk

Manajemen Produk digunakan untuk melihat, menambah, mengubah dan menghapus produk (CRUD). Fitur ini digunakan oleh admin untuk memudahkan manajemen produknya.

<a name="tabel-daftar-produk"></a>
### Tabel Daftar Produk

Menampilkan Seluruh produk dalam bentuk tabel, dalam file `/jualan/manajemen_store/manajemen_produk.php` :

	<h2>Manajemen Produk
		<!-- Tombol menuju halaman tambah produk  -->
		<a class="btn btn-primary pull-right" href="./?ur=manajemen_store/tambah_produk">
		<span class="glyphicon glyphicon-plus-sign"></span> &nbsp; Tambah</a>
	</h2>
	<br>
	<table class="table table-stripped">
		<thead>
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>URL Gambar</th>
			<th>Opsi</th>
			<tbody>
			<?php
				// SQL INNER JOIN digunakan untuk menggabungkan hasil dari 2 tabel
				$sql = "SELECT produk.*, all_kategori.nama_kategori FROM produk INNER JOIN all_kategori ON produk.kategori_produk=all_kategori.id_kategori";
				$exe = mysql_query($sql);
				while($produk=mysql_fetch_array($exe))
				{
					// Keluarin isi tabel disini
			?>
				<tr>
					<td><?php echo $produk[id_produk]; ?></td>
					<td><?php echo $produk[nama_produk]; ?></td>
					<td><?php echo $produk[harga_produk]; ?></td>
					<td><?php echo $produk[nama_kategori]; ?></td>
					<td><?php echo $produk[gambar_produk]; ?></td>
					<td>
						<!-- Link edit produk disertai variable idproduk -->
						<a href="./?ur=manajemen_store/edit_produk&idproduk=<?php echo $produk[id_produk]; ?>">Edit</a>
						 -
						 <!-- Link hapus produk disertai variable idproduk
						 dan konfirmasi js "return confirm()"
						  -->
						 <a onclick="return confirm('Hapus produk ini?')" href="./?ur=manajemen_store/hapus_produk&idproduk=<?php echo $produk[id_produk]; ?>">Hapus</a></td>
				</tr>
			<?php }; // Tutupnya While
			?>
			</tbody>
		</thead>
	</table>

<a name="hapus-produk"></a>
### Hapus Produk

Berasal dari tag link dari file `/jualan/manajemen_store/manajemen_produk.php` yang kodenya :

	<a onclick="return confirm('Hapus produk ini?')" href="./?ur=manajemen_store/hapus_produk&idproduk=<?php echo $produk[id_produk]; ?>">Hapus</a>

Dari link tersebut, menuju konten dari file `/jualan/manajemen_store/hapus_produk.php` yang selanjutnya kita isi :

	<?php
		// $_GET[idproduk] berasal dari variable di URL 'idproduk'
		$idproduk 	= $_GET[idproduk];

		// SQL untuk hapus produk dengan id yang didapat
		$sqldel 	= "DELETE FROM produk WHERE id_produk =" . $idproduk;
		$exedel 	= mysql_query($sqldel) OR DIE(mysql_error());

		// Redirect ke halaman lain setelah hapus berhasil
		header('location: ./?ur=manajemen_store/manajemen_produk');
	?>

<a name="tambah-produk"></a>
### Tambah Produk

Berasal dari tag link dari file `/jualan/manajemen_store/manajemen_produk.php` yang kodenya :

	<a class="btn btn-primary pull-right" href="./?ur=manajemen_store/tambah_produk">
		<span class="glyphicon glyphicon-plus-sign"></span> &nbsp; Tambah
	</a>

Dari link tersebut, menuju konten dari file `/jualan/manajemen_store/tambah_produk.php` yang selanjutnya kita isi :

	<?php
		// Tambah Produk Action, akan dieksekusi setelah form dikirim
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

			// Redirect ke halaman daftar produk setelah add selesai
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

<a name="edit-produk"></a>
### Edit Produk

Tampilan edit tidak jauh berbeda dengan **tambah produk** hanya bedanya pada form sudah di preset dengan value masing-masing dari tabel. Dan saat di submit perintahnya bukan `INSERT` melainkan `INSERT`.

Edit berasal dari tag link dari file `/jualan/manajemen_store/manajemen_produk.php` yang kodenya :

	<a href="./?ur=manajemen_store/edit_produk&idproduk=<?php echo $produk[id_produk]; ?>">Edit</a>

Dari link tersebut, menuju konten dari file `/jualan/manajemen_store/edit_produk.php` yang selanjutnya kita isi :

	<?php
		// Edit Produk Action, eksekusi setelah form di submit
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
			// Menampilkan value dari setiap kolom
			// yang dipilih berdasarkan id
			// dengan cara $produk[nama-kolom-tabel]
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

<a name="penutup"></a>
## Penutup

![Screenshot](https://raw.githubusercontent.com/axquired24/hiweb-online-store/readme-asset/jualanbatik-2.jpg)

Website Online-store sederhana sudah jadi. Website ini sengaja tidak ditambahkan fitur tambahan seperti keranjang belanja, login customer, perhitungan total belanja, dsb dikarenakan tujuan modul ini adalah **BASIC** CRUD dan Dynamic Page dengan studi kasus Online-Store. Semoga yang sedikit ini bisa membantu memahami dasar-dasar website dinamis dan lompatan menuju level selanjutnya.

<a name="github"></a>
### Lihat di Github

Kode lengkap website ini bisa dilihat di [github](http://github.com/axquired24). Disana juga ada beberapa repository yang sengaja saya share untuk berbagi ilmu sesama pengembang website khususnya PHP.

<a name="penulis"></a>
### Penulis

![Albert Septiawan](https://raw.githubusercontent.com/axquired24/hiweb-online-store/readme-asset/axl.jpg)

Nama Lengkap Albert Septiawan. lahir di Lampung, 24 September 1995. Saat ini (Agustus, 2016) saya masih mahasiswa di Universitas Muhammadiyah Surakarta semester 7 yang juga sebagai Freelance bidang Web Developer yang lebih fokus pada framework PHP laravel dan Branding Digital Designer.  

Kontak : albertseptiawan24@gmail.com  
Github : github.com/axquired24  
FB 	   : fb.com/axquiredsaint24  