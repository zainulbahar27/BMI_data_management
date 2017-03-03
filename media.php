<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/class_paging.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  include "hapus_orderfiktif.php";?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php include "dina_titel.php"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="ZStudio">
<meta name="author" content="eeq">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">


<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!--// Stylesheet //-->
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/contentslider.css" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ad-gallery.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.fancybox-1.3.1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<!--// Javascript //-->
<script type="text/javascript" src="config/jquery.js"></script>
<script type="text/javascript" src="js/clearbox.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/anythingslider.js"></script>
<script type="text/javascript" src="js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="js/thumbgallery.js"></script>
<script type="text/javascript" src="js/eurofurence_500-eurofurence_700.font_9bc22cbd.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="js/newsticker.js"></script>

<!--[if lte IE 7]>
<script type="text/javascript" src="js/jquery.dropdown.js"></script>
<![endif]-->


<script type="text/javascript" src="js/easy.js"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$.easy.tooltip();	
});
</script>
<script type="text/javascript">
$().ready(function() {
	$("#name").autocomplete("cari.php", {
		width: 218,
		matchContains: true,
		selectFirst: false
	});
});
</script>




<meta charset="UTF-8">

<style type="text/css">
<!--
.style1 {color: #FF6600}
-->
</style>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<div id="head">
	  <div class="logo">
        	<a href="index.html"><img src="images/logo.png" alt="" /></a>
      </div>
        <div class="rightnavi">
          <div class="clear">
          <ul><SCRIPT language=JavaScript src="almanak.js"></SCRIPT> 
          <span class="style1">I</span> <SCRIPT language=JavaScript>var d = new Date();
var h = d.getHours();
if (h < 11) { document.write('Selamat Pagi'); }
else { if (h < 15) { document.write('Selamat Siang'); }
else { if (h < 19) { document.write('Selamat Sore'); }
else { if (h <= 23) { document.write('Selamat Malam'); }
}}}</SCRIPT>    </ul> </div>
      </div>
        <div class="clear"></div>
        <div id="menu">
			     <ul class="menu">
            <?php               
              $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

              while($r=mysql_fetch_array($main)){
	             echo "<li><a href='$r[link]'><span>$r[nama_menu]</span></a>";
	             $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main] AND submenu.id_submain=0 AND submenu.aktif='Y'");
               $jml=mysql_num_rows($sub);
                // apabila sub menu ditemukan                
                if ($jml > 0){
                  echo "<div><ul>";                 
	                while($w=mysql_fetch_array($sub)){
                    echo "<li><a href='$w[link_sub]' class='parent'><span>&#187; $w[nama_sub]</span></a>";
            			  $sub2 = mysql_query("SELECT * FROM submenu WHERE id_submain=$w[id_sub] AND id_submain!=0");
                    $jml2=mysql_num_rows($sub2);
                    if ($jml2 > 0){
			         			  echo "<div><ul>";
			                 while($s=mysql_fetch_array($sub2)){
			  	                echo "<li><a href='$s[link_sub]'>&#187; $s[nama_sub]</a></li>";
			                 }
			                echo "</ul></div></li>";
			              }
	                }           
	                
                 echo "</li></ul></div>
                       </li>";
                }
                else{
                  echo "</li>";
                }
              }        
            ?>
		      </ul>
	       </div></div>
    <div class="clear"></div>
    <div id="crumb">
    	<ul class="left">
        	<li><p>Anda Berada Di:</p></li>
            </ul>
			<ul class="left2">
              <?php include "breadcrumb.php";?>
      
        </ul>
        <ul class="search right"><form method="POST" action="hasil-pencarian.html">
            	<li><input id="name" name="kata" type="text" placeholder="cari barang..."  class="bar" /></li>
                <li><input type="submit" class="go" value="cari" /></li></form>
      </ul>
  </div>
    <div class="clear"></div>
    <div class="rotating_banner">
            	<div class="anythingSlider">
                  <div class="wrapper">
                    <ul>
                    
		
                       <?php
$header=mysql_query("SELECT * FROM header ORDER BY id_header DESC LIMIT 4");
while($b=mysql_fetch_array($header)){
  echo "<li><img width=940 src='header/$b[gambar]'></li>";
  
}?>
                    
                    </ul>
                  </div>
                </div>
  </div>
    <div class="clear"></div>
    <div id="content_sec">
    	<div class="col1">
        
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/spacer.gif" width="1" height="20" /></td>
              </tr>
              <tr>
                <td><span class="center_content2"><?php include "tengah.php";?></td>
              </tr>
            </table>
            <div class="clear"></div>
      </div>
    	<div class="col2">
       	  <div class="mycart">
            	
       	  
            	<div class="small_heading">
            		<h5>Kategori Produk </h5>
                </div>
                <ul>
                
                  <?php
            $kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
                                  count(produk.id_produk) as jml 
                                  from kategori left join produk 
                                  on produk.id_kategori=kategori.id_kategori 
                                  group by nama_kategori");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
              if(($no % 2)==0){
                echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";
              }
              else{
                echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";              
              }
              $no++;
            }
            ?></li>
              
                </ul>
            </div>
			

		  
		  
		  <div class="poll">
            	<div class="small_heading">
            		<h5>Statistik Pengunjung  </h5>
                </div>
                <table width="111%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="11%">&nbsp;</td>
                    <td width="89%">
                      
                      <div align="left">
                        <?php
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

  echo "<p align='center'>
       <span class='pengunjung'><img src=counter/online.png>    Pengunjung Online : $pengunjungonline <br />
        <span class='pengunjung'><img src=counter/hariini.png>  Pengunjung Hari Ini : $hits[hitstoday] <br />
	  </p>";
?>
                        </div></td></tr>
                </table>
		  </div>
		  </div>
    	<div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <div class="aboutus">
        	<h5>Tentang </h5>
        	<p>
            	PT Bumi Menara Internusa (BMI) serves the world with quality and nutritious seafood products ranging from fresh shrimp and crab to species of fish. Benefiting from two decades of experience, BMI presently operates a number of facilities in Indonesia to fulfill the world’s demand for quality seafood products.            </p>
            <a href="profil-kami.html" class="simplebtn">selanjutnya</a>
        </div>
        <div class="ourblog">
        	
        </div>
        <div class="joinnews">
          <ul>
            	<li>
            	  
            	</li>
            	<li></li>
            </ul>
        </div>
        <div class="contactus">
        	<h5>Kontak Kami </h5>
            <ul>
            	<li class="tel"><span class="bold">Telp:</span> (031)7491000 </li>
                <li class="email"><span class="bold">Email:</span> <a href="mailto:rizal_fzl@yahoo.com">PT.bmi@gmail.com</a></li>
                <li class="skype"><span class="bold">Skype:</span> PT.BMI</li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="copyright_network">
        	<p>Copyright ©2016 Develoved by:KKN Universitas Brawijaya  </p>
            
        </div>
        <div class="clear"></div>
	</div>
</div>

</body>
</html>

