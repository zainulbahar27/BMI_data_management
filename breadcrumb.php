<?php
if($_GET['module']=='beranda'){
	echo "<span class='current'>Beranda</span>";
}
elseif($_GET['module']=='profilkami'){
	echo "<span class='current'>Profil</span>";
}
elseif($_GET['module']=='halamanstatis'){
		$detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='".$val->validasi($_GET['id'],'sql')."'");
		$d   = mysql_fetch_array($detail);
	echo "<span class='current'>$d[judul]</span>";
}
elseif($_GET['module']=='hubungikami'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hubungiaksi'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hasilcari'){
	echo "<span class='current'>Hasil Pencarian</span>";
}

elseif($_GET['module']=='detailproduk'){
	$detail	=mysql_query("SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$_GET[id]'");
	$d		= mysql_fetch_array($detail);
	echo "<span class=judul_head><a href='home'>Beranda</a> &#187; <a href=kategori-$d[id_kategori]-$d[kategori_seo].html>$d[nama_kategori]</a> &#187; $d[nama_produk]</span>";
}
elseif($_GET['module']=='detailkategori'){
	$detail	=mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
	$d		= mysql_fetch_array($detail);
	echo "<span class=judul_head><a href='home'>Beranda</a> &#187; $d[nama_kategori]</span>";
}
?>
