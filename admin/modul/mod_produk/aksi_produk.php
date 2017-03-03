<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($module=='produk' AND $act=='hapus'){
  mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input produk
elseif ($module=='produk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);
	$tampil=mysql_query("SELECT COUNT(id_produk) FROM produk WHERE id_produk='$_POST[id_produk]'");
	$kode=print_r(mysql_result($tampil,0),TRUE);
  // Apabila ada gambar yang diupload
  if($kode==0)
  {
		if (!empty($lokasi_file)){
		UploadImage($nama_file_unik);

		mysql_query("INSERT INTO produk(id_produk,
										nama_produk,
										produk_seo,
										id_kategori,
										packingan_kemasan,
										moq,
										lead_time,
										price_index,
										rijek_index,
										nama_supllier,
										price_terakhir,
										top,
										sertifikat,
										harga,
										diskon,
										stok,
										deskripsi,
										gambar) 
								VALUES('$_POST[id_produk]',
									   '$_POST[nama_produk]',
									   '$produk_seo',
									   '$_POST[kategori]',
									   '$_POST[packingan_kemasan]',
									   '$_POST[moq]',
									   '$_POST[lead_time]',
									   '$_POST[price_index]',
									   '$_POST[rijek_index]',
									   '$_POST[nama_supllier]',
									   '$_POST[price_terakhir]',
									   '$_POST[top]',
									   '$_POST[sertifikat]',
									   '$_POST[harga]',
									   '$_POST[diskon]',
									   '$_POST[stok]',
									   '$_POST[deskripsi]',
									   '$nama_file_unik')");
	  }
	  else{
		mysql_query("INSERT INTO produk(id_produk,
										nama_produk,
										produk_seo,
										id_kategori,
										packingan_kemasan,
										moq,
										lead_time,
										price_index,
										rijek_index,
										nama_supllier,
										price_terakhir,
										top,
										sertifikat,
										harga,
										diskon,
										stok,
										deskripsi) 
								VALUES('$_POST[id_produk]',
									   '$_POST[nama_produk]',
									   '$produk_seo',
									   '$_POST[kategori]',
									   '$_POST[packingan_kemasan]',
									   '$_POST[moq]',
									   '$_POST[lead_time]',
									   '$_POST[price_index]',
									   '$_POST[rijek_index]',
									   '$_POST[nama_supllier]',
									   '$_POST[price_terakhir]',
									   '$_POST[top]',
									   '$_POST[sertifikat]',
									   '$_POST[harga]',
									   '$_POST[diskon]',
									   '$_POST[stok]',
									   '$_POST[deskripsi]')");
	  }
	  header('location:../../media.php?module='.$module);
  }
  else
  {
	echo "<script>alert('Barang dengan kode $_POST[id_produk] sudah ada'); history.go(-1)</script>";
  }
}

// Update produk
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila gambar tidak diganti
if (empty($lokasi_file)){
			mysql_query("UPDATE produk SET id_produk = '$_POST[id_produk]',
										   nama_produk = '$_POST[nama_produk]',
										   produk_seo  = '$produk_seo', 
										   id_kategori = '$_POST[kategori]',
										   packingan_kemasan       = '$_POST[packingan_kemasan]',
										   moq       = '$_POST[moq]',
										   lead_time       = '$_POST[lead_time]',
										   price_index       = '$_POST[price_index]',
										   rijek_index       = '$_POST[rijek_index]',
										   nama_supllier       = '$_POST[nama_supllier]',
										   price_terakhir       = '$_POST[price_terakhir]',
										   top       = '$_POST[top]',
										   sertifikat       = '$_POST[sertifikat]',
										   harga       = '$_POST[harga]',
										   diskon       = '$_POST[diskon]',
										   stok       = '$_POST[stok]',
										   deskripsi   = '$_POST[deskripsi]'
									 WHERE id_produk   = '$_POST[id]'");
		  }
		  else{
			UploadImage($nama_file_unik);
			mysql_query("UPDATE produk SET id_produk = '$_POST[id_produk]',
										   nama_produk = '$_POST[nama_produk]',
										   produk_seo  = '$produk_seo', 
										   id_kategori = '$_POST[kategori]',
										   packingan_kemasan       = '$_POST[packingan_kemasan]',
										   moq       = '$_POST[moq]',
										   lead_time       = '$_POST[lead_time]',
										   price_index       = '$_POST[price_index]',
										   rijek_index       = '$_POST[rijek_index]',
										   nama_supllier       = '$_POST[nama_supllier]',
										   price_terakhir       = '$_POST[price_terakhir]',
										   top       = '$_POST[top]',
										   sertifikat       = '$_POST[sertifikat]',
										   harga       = '$_POST[harga]',
										   diskon       = '$_POST[diskon]',
										   stok       = '$_POST[stok]',
										   gambar      = '$nama_file_unik'   
									 WHERE id_produk   = '$_POST[id]'");
		  }
		  header('location:../../media.php?module='.$module);
	
}
?>
