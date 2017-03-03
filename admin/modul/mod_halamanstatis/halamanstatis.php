<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
}
else{

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){

  // AWAL TAMPIL //////////////////////////
   default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=halamanstatis&act=tambahhalamanstatis' class='button'>
   <span>Tambahkan Halaman Baru</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>HALAMAN STATIS</h1>
   <span></span> 
   </div>
   <div class='block-content'>		
    		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>
   <th><center>No.</center></th>
   <th>Judul</th>
   <th>Link</th>
   <th>Tanggal Posting</th>
   <th>Aksi</th></tr>
   
    </thead>
    <tbody>";
	$p      = new Paging;
    $batas  = 100;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM halamanstatis 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_halaman DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
    $tgl_posting=tgl_indo($r[tgl_posting]);

	$huruf_kecil = strtolower($r[judul]);
	$pisah_huruf = explode(" ",$huruf_kecil);
	$gabung_huruf = implode("",$pisah_huruf);
    
	$lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 
 	
   echo "
   <tr class=gradeX>
   <td width=50>$g</td>
   <td>$r[judul]</td>
   <td>statis-$r[id_halaman]-$gabung_huruf.html</td>
   <td>$tgl_posting</td>
   <td width=80>
   
   <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman] rel=tooltip-top title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]') 
  title='Hapus' class='with-tip' rel=tooltip-top>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
   </td></tr>";
    $no++;
      }  
   echo "</tbody></table> ";
 
    break;    

  //TAMBAH//////////////////////////

   case "tambahhalamanstatis":
 
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH HALAMAN BARU</h1>
   </div>
   <div class='block-content'>	
	
    <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>

   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' size=60>
   </p> 	
		  			
   <p class=inline-small-label> 
   <label for=field4>Isi Halaman</label>
   <textarea name='isi_halaman' style='width: 720px; height: 200px;'></textarea>
   </p> 	
   

   <p class=inline-small-label> 
   <span class=label>Gambar</span>
   <input type='file' name='fupload'/><br/>
   </p><br/>	
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
    <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
   
   break;
    
	// EDIT //////////////////////////
	
    case "edithalamanstatis":
	
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $e    = mysql_fetch_array($edit);


   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT HALAMAN STATIS</h1>
   </div>
   <div class='block-content'>
	
    <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
    <input type=hidden name=id value=$e[id_halaman]>
	
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' size=60 value='$e[judul]'>
   </p> 
	   
   <p class=inline-small-label> 
   <label for=field4>Isi Halaman</label>
  <textarea name='isi halaman' style='width: 720px; height: 200px;'>$e[isi_halaman]</textarea>
   </p>		  
		  
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label> ";
    if ($e[gambar]!=''){
    echo "<img src='../foto_statis/kecil_$e[gambar]'></p><br>";  }
		  
   echo "
   <br/>
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
   <input type=file name='fupload' size=30>  
   </p>		  

      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
   ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>