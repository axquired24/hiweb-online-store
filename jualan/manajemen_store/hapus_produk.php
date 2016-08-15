<?php
	$idproduk 	= $_GET[idproduk];
	$sqldel 	= "DELETE FROM produk WHERE id_produk =" . $idproduk;
	$exedel 	= mysql_query($sqldel) OR DIE(mysql_error());
	header('location: ./?ur=manajemen_store/manajemen_produk');
?>