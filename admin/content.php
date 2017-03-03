<?php

   include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";

   // Bagian Home
   if ($_GET['module']=='home'){
   if ($_SESSION['leveluser']=='admin'){
   echo "
  
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
                             
   <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada  
   Control Panel di bawah ini :</p>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MODUL ADMINISTRATOR</h1>
   <span></span> 
   </div>
   <div class='block-content'>
 
   <ul class='shortcut-list'>
  
   <li><a href=media.php?module=menuutama><img src='img/modul.png'/>Menu Utama</a></li>
   <li><a href=media.php?module=submenu><img src='img/submenu.png'/>Sub Menu</a></li>
   <li><a href=media.php?module=produk><img src='img/produk.png'/>Produk</a></li>
   <li><a href=media.php?module=profil><img src='img/profil.png'/>Profil</a></li>
   <li><a href=media.php?module=welcome><img src='img/blog.png'/>Welcome</a></li>
   <li><a href=media.php?module=halamanstatis><img src='img/template.png'/>Halaman Statis</a></li>
   <li><a href=media.php?module=password><img src='img/user.png'/>Setting Password</a></li>
   <li><a href=media.php?module=hubungi><img src='img/kontak.png'/>Pesan Masuk</a></li>
   <li><a href=media.php?module=modul><img src='img/module.png'/>Modul Web</a></li>
	
   </ul>

  <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
   echo " </div>";
  
  
 
  } else {
  
 echo "<div id='main-content'>
 <div class='container_12'>
 <div class='grid_12'>
                             
 <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda. <br/></p>
 </div>
 <div class='grid_12'>

 <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
  echo " </div>";
 }
}


// Bagian Option
elseif ($_GET['module']=='option'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_option/option.php";
  }
}

// (BARU) Bagian Header
elseif ($_GET['module']=='header'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_header/header.php";
  }
}
// Bagian User
elseif ($_GET['module']=='profil'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_profil/profil.php";
  }
}


// Bagian Password
elseif ($_GET['module']=='password'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_password/password.php";
  }
}

// Bagian Modul
elseif ($_GET['module']=='modul'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_modul/modul.php";
  }
}
// Bagian Aktialita
elseif ($_GET['module']=='aktualita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_aktualita/aktualita.php";                            
  }
}
// Bagian Kategori
elseif ($_GET['module']=='kategori'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_kategori/kategori.php";
  }
}
// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}
// Bagian Tag
elseif ($_GET['module']=='tag'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_tag/tag.php";
  }
}
// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}
// Bagian Banner
elseif ($_GET['module']=='banner'){
  if (@$_SESSION['leveluser']=='admin' OR @$_SESSION['leveluser']=='user'){
    include "modul/mod_banner/banner.php";
  }
}
// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Produk
elseif ($_GET['module']=='produk'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_produk/produk.php";
  }
}

// Bagian welcome
elseif ($_GET['module']=='welcome'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_welcome/welcome.php";
  }
}


// Bagian Menu Utama
elseif ($_GET['module']=='menu'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_menu/menu.php";
  }
}




// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}
// Bagian Logo
elseif ($_GET['module']=='logo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_logo/logo.php";
  }
}
//----------------video------------------>
// Bagian Playlist
elseif ($_GET['module']=='playlist'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_playlist/playlist.php";
  }
}
// Bagian Video
elseif ($_GET['module']=='video'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_video/video.php";
  }
}

// Bagian KomentarVideo 
elseif ($_GET['module']=='komentarvid'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_komentarvid/komentarvid.php";
  }
}

// Bagian Tag Video
elseif ($_GET['module']=='tagvid'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_tagvid/tagvid.php";
  }
}

// Bagian Identitas Website
elseif ($_GET['module']=='identitas'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_identitas/identitas.php";
  }
}


// Bagian Daftar Member
elseif ($_GET['module']=='member'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_member/member.php";
  }
}

  
  // Bagian Background
  elseif ($_GET['module']=='background'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_background/background.php";}}
  
  // Bagian menuutama
  elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin'){
  include "modul/mod_menuutama/menuutama.php";}}
  
  // Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}   


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}


?>
