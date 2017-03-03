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
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "
	<div id='main-content'>
   	<div class='container_12'>
   	<div class=grid_12>
	<h2>PRODUK</h2>
	<a href='?module=produk&act=tambahproduk' class='button'>
    <span>Tambah Produk</span>
    </a><br/><br/>
    <div class='grid_12'>
    <div class='block-border'>
    <div class='block-header'>
    <span></span> 
    </div>
    <div class='block-content'>
	<table id='table-example' class='table'>
    <thead>
    	<tr><td class='center'>no</td>
          <td class='center'>Kode Produk</td>
		  <td class='center'>Nama Produk</td>
		  <td class='center'>Packingan Kemasan</td>
          <td class='center'>MOQ</td>
          <td class='left'>Lead Time</td>
          <td class='center'>Price Index</td>
          <td class='center'>% Rijek Index</td>
		  <td class='center'>Nama Supllier</td>
		  <td class='center'>Price Terakhir</td>
		  <td class='center'>TOP</td>
          <td class='center'>Sertifikat</td>
          <td class='left'>harga</td>
          <td class='center'>diskon</td>
          <td class='center'>stok</td>
          <td class='center'>aksi</td></tr></thead><tbody>";          

    $tampil = mysql_query("SELECT * FROM produk");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
	  $tanggal=tgl_indo($r[tgl_masuk]);
      $price_index=format_rupiah($r[price_index]);
	  $price_terakhir=format_rupiah($r[price_terakhir]);
	  $harga=format_rupiah($r[harga]);
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[id_produk]</td>
				<td class='left'>$r[nama_produk]</td>
				<td class='left'>$r[packingan_kemasan]</td>
                <td class='left'>$r[moq]</td>
				<td class='left'>$r[lead_time]</td>
				<td class='left'>$price_index</td>
				<td class='left'>$r[rijek_index]</td>
				<td class='left'>$r[nama_supplier]</td>
				<td class='left'>$price_terakhir</td>
				<td class='left'>$r[top]</td>
				<td class='left'>$r[sertifikat]</td>
				<td class='left'>$harga</td>
				<td class='left'>$r[diskon]</td>
				<td class='left'>$r[stok]</td>
                
		            <td class='center' width='85'><a href=?module=produk&act=editproduk&id=$r[id_produk] title=Edit rel=tooltip-top class=with-tip><center>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/edit.png' border='0' /></a>
		                <a href=javascript:confirmdelete('$aksi?module=produk&act=hapus&id=$r[id_produk]') 
   title='Hapus' class='with-tip' rel=tooltip-top>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahproduk":
    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH PRODUK</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>

   <p class=inline-small-label> 
   	<label for=field4>Kode Produk</label>
 	<input type=text name='id_produk' size=60>
   	</p> 	
		  			
   <p class=inline-small-label> 
   	<label for=field4>Nama Produk</label>
 	<input type=text name='nama_produk' size=60>
   	</p> 
	
   <p class=inline-small-label> 
   	<label for=field4>Kategori</label>
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></p>

	<p class=inline-small-label> 
   	<label for=field4>Packingan Kemasan</label>
 	<input type=text name='packingan_kemasan' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>MOQ</label>
 	<input type=text name='moq' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Lead Time</label>
 	<input type=text name='lead_time' size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>Price Index</label>
 	<input type=text name='prixe_index' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>%Rijek Index</label>
 	<input type=text name='rijek_index' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Nama Supllier</label>
 	<input type=text name='nama_supllier' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Price Terakhir</label>
 	<input type=text name='price_terakhir' size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>TOP</label>
 	<input type=text name='top' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>Sertifikat/dokumen supplier (COO/COA/food grade)</label>
 	<input type=text name='sertifikat' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Harga</label>
 	<input type=text name='harga' size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>diskon</label>
 	<input type=text name='diskon' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>Stok</label>
 	<input type=text name='stok' size=60>
   	</p>
	
	<p class=inline-small-label> 
   <label for=field4>Deskripsi</label>
   <textarea name='deskripsi'  style='width: 720px; height: 350px;'></textarea>
   </p>
	
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40></br>
   <span class style=\"font-size:11px;color:#666;\">&nbsp;&nbsp;&nbsp;&nbsp;
	  (ukuran file gambar header harus <b>980 x 300</b>)</span></p><br/>";
   echo "</p> 	
	
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=header'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
   
   break;
    
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT PRODUK</h1>
   </div>
   <div class='block-content'>
	
    <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
    <input type=hidden name=id value=$r[id_produk]>
	
   <p class=inline-small-label> 
   <label for=field4>Kode Produk</label>
   <input type=text name='id_produk' value='$r[id_produk]' size=40>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Nama Produk</label>
   <input type=text name='nama_produk' value='$r[nama_produk]' size=40>
   </p>
          
	<p class=inline-small-label> 
   	<label for=field4>Kategori</label>
   	<select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select></p>
	  <p class=inline-small-label> 
   	<label for=field4>Packingan Kemasan</label>
 	<input type=text name='packingan_kemasan' value='$r[packingan_kemasan]' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>MOQ</label>
 	<input type=text name='moq' value='$r[moq]' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Lead Time</label>
 	<input type=text name='lead_time' value='$r[lead_time]'  size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>Price Index</label>
 	<input type=text name='prixe_index' value='$r[prixe_index]' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>%Rijek Index</label>
 	<input type=text name='rijek_index'  value='$r[rijek_index]' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Nama Supllier</label>
 	<input type=text name='nama_supllier' value='$r[nama_supllier]' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Price Terakhir</label>
 	<input type=text name='price_terakhir' value='$r[price_terakhir]' size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>TOP</label>
 	<input type=text name='top' value='$r[top]' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>Sertifikat/dokumen supplier (COO/COA/food grade)</label>
 	<input type=text name='sertifikat' value='$r[sertifikat]' size=60>
   	</p>
	<p class=inline-small-label> 
   	<label for=field4>Harga</label>
 	<input type=text name='harga' value='$r[harga]' size=60>
   	</p>
	
	<p class=inline-small-label> 
   	<label for=field4>diskon</label>
 	<input type=text name='diskon' value='$r[diskon]' size=60>
   	</p> 
	<p class=inline-small-label> 
   	<label for=field4>Stok</label>
 	<input type=text name='stok' value='$r[stok]' size=60>
   	</p>
	
   <p class=inline-small-label> 
   <label for=field4>Deskripsi</label>
  <textarea name='deskripsi' style='width: 720px; height: 200px;'>$r[deskripsi]</textarea>
   </p>		  
		  
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label> ";
    if ($r[gambar]!=''){
    echo "<img src='../foto_produk/small_$r[gambar]'></p>";  }
		  
   echo "
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
   <input type=file name='fupload' size=30>  
   </p>		  

      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=produk'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
    break;  
}
}
?>
