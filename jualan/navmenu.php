<?php 
	// Variable Dinamic URL
	  $list_barang  = "ur=konten/list_barang";
	  $detail_barang = "ur=konten/detail_barang";
	  $manajemen_produk = "ur=manajemen_store/manajemen_produk";	
?>
<h3 class="page-header">Main Menu <span class="glyphicon glyphicon-th-list pull-right"></span></h3>
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="./"><span class="glyphicon glyphicon-home"></span> &nbsp; Home</a></li>
  <li role="presentation"><a href="./?<?php echo $list_barang; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;  List Barang</a></li>
  <li role="presentation"><a href="./?<?php echo $manajemen_produk; ?>"><span class="glyphicon glyphicon-cog"></span>&nbsp; Manajemen Produk</a></li>  
</ul>