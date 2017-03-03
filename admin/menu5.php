<?php
include "../config/koneksi.php";


$cek=umenu_akses("?module=hubungi",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=hubungi'><b>Pesan Masuk</b></a></li>";
}

$cek=umenu_akses("?module=header",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=header'><b>Gambar Header</b></a></li>";
}

$cek=umenu_akses("?module=profil",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=profil'><b>Profil Website</b></a></li>"; 
}

$cek=umenu_akses("?module=welcome",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=welcome'><b>Selamat Datang</b></a></li>"; 
}

$cek=umenu_akses("?module=halamanstatis",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=halamanstatis'><b>Halaman Statis</b></a></li>";
}
?>
