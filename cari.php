<?php
include("config/koneksi.php");
$search = strtolower($_GET["q"]);
if (!$search) return;
$sql = "SELECT DISTINCT produk.id_kategori,produk.nama_produk,kategori.kd_kategori from produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$search%' OR kd_kategori LIKE '%$search%' limit 5";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query)) {
	$name = $row[1];
	$names = $row[2];
	echo "$name\n$names\n";
}
?>