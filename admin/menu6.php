<?php
include "../config/koneksi.php";


$cek=umenu_akses("?module=password",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=password'><b>Setting Password</b></a></li>";
}


$cek=umenu_akses("?module=modul",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=modul'><b>Manajemen Modul</b></a></li>";
}

$cek=umenu_akses("?module=menuutama",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=menuutama'><b>Setting Menu Utama</b></a></li>";
}

$cek=umenu_akses("?module=submenu",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=submenu'><b> Setting Sub Menu</b></a></li>";
}

$cek=umenu_akses("?module=produk",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=produk'><b> Setting Produk</b></a></li>";
}

?>
