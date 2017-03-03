<?php
session_start();
$font_path = "RIZAL.TTF";
$image_path = "../../../logo/zal_marking.png";
$font_size = 10;       // in pixcels
//$water_mark_text_1 = "9";
$water_mark_text_2 = "SwaraKalibata";

function watermark_image($oldimage_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -10; 
    $pos_y = $height - $w_height - 10;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $oldimage_name, 100);
    imagedestroy($im);
	return true;
}

//fungsi thumb logo
function thumb_logo($nama_file){
//identitas file asli  
  $im_src = imagecreatefrompng($nama_file);
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 150;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagepng($im,"logo.png");
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus halaman statis
if ($module=='halamanstatis' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM halamanstatis WHERE id_halaman='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
     unlink("../../../foto_statis/$_GET[namafile]");   
     unlink("../../../foto_statis/kecil_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);


  mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input halaman statis
elseif ($module=='halamanstatis' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 $judul_seo = seo_title($_POST['judul']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
   // UploadStatis($nama_file_unik);
	UploadStatis($nama_file_unik,'../../../foto_statis/',300,120);
	watermark_image('../../../foto_statis/'.$nama_file_unik);
	watermark_image('../../../foto_statis/kecil_'.$nama_file_unik);

   mysql_query("INSERT INTO halamanstatis(judul,
                                    judul_seo,
                                    isi_halaman,
									tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
                                   '$_POST[isi_halaman]',
								   '$tgl_sekarang',
                                   '$nama_file_unik')");
								   
								   
  header('location:../../media.php?module='.$module);
  }
  else{
     mysql_query("INSERT INTO halamanstatis(judul,
                                    judul_seo,
									tgl_posting,
                                    isi_halaman) 
                            VALUES('$_POST[judul]',
                                   '$judul_seo',
								   '$tgl_sekarang', 
                                   '$_POST[isi_halaman]')");
								   
								   
								   
  header('location:../../media.php?module='.$module);
  }
}

// Update halaman statis
elseif ($module=='halamanstatis' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
     mysql_query("UPDATE halamanstatis SET judul  = '$_POST[judul]',
                                   judul_seo   = '$judul_seo',
                                   isi_halaman  = '$_POST[isi_halaman]'  
                             WHERE id_halaman   = '$_POST[id]'");
							 
  header('location:../../media.php?module='.$module);
  }
  else{    
    //UploadStatis($nama_file_unik);
	// Penambahan fitur unlink utk menghapus file yg lama biar gak ngebek-ngebeki server ^_^
	$data_gambar= mysql_query("SELECT gambar FROM halamanstatis WHERE id_halaman='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_statis/'.$r['gambar']);
	@unlink('../../../foto_statis/'.'kecil_'.$r['gambar']);
    UploadStatis($nama_file_unik,'../../../foto_statis/',300,120);
	watermark_image('../../../foto_statis/'.$nama_file_unik);
	watermark_image('../../../foto_statis/kecil_'.$nama_file_unik);
	
	 mysql_query("UPDATE halamanstatis SET judul  = '$_POST[judul]',
                                   judul_seo   = '$judul_seo',
                                   isi_halaman  = '$_POST[isi_halaman]',  
                                   gambar      = '$nama_file_unik'   
                             WHERE id_halaman   = '$_POST[id]'");
							 
							 
							 
    header('location:../../media.php?module='.$module);
	}
    
  }

}
?>
