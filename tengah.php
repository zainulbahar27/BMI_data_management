

<?php
// Halaman utama (Home)
if ($_GET[module]=='beranda'){
  // Data selamat datang mengacu pada id_modul=56
	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='56'");
	$r      = mysql_fetch_array($profil);

     echo " 
            </div><div class='profil2'>$r[static_content]<br /> </div>
          </div> "; 
		  
		  // di atas hanya tambahan
		  
		  
  echo "<h4 class='heading colr2'>==========</h4><br />";
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 20");
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="<span class='prod_cart_habis'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
                             <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' title='klik untuk memperbesar gambar'></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
          </div>
          </div>";
  }
}


// Modul detail produk
elseif ($_GET[module]=='detailproduk'){
	$idd = mysql_query("SELECT TRIMLETTERS('$_GET[id]') AS id");
	$kkode=print_r(mysql_result($idd,0),TRUE);
	$detail=mysql_query("SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$kkode'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	
    $harga = format_rupiah($d[harga]);
    $disc     = ($d[diskon]/100)*$d[harga];
    $hargadisc     = number_format(($d[harga]-$disc),0,",",".");


	echo "<h4 class='heading colr'>Kategori: <a href='kategori-$d[id_kategori]-$d[kategori_seo].html'>$d[nama_kategori]</a></h4></div>";

	echo"<div class='feat_prod_box_details'>";
 	if ($d[gambar]!=''){
		echo "<div class='prod_img3'><a href='foto_produk/$d[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$d[nama_produk]'<img src='foto_produk/$d[gambar]' width=180  class='tooltip' title='klik untuk memperbesar gambar' border='0' rel='clearbox[gallery=Koleksi Produk]' title='$d[nama_produk]'/></a>

                </div>";}
	            echo"<div class='details_big_box'>
            <div class='product_title_big'>$d[nama_produk]</div>
            <div class='details'>$d[deskripsi]</div><br />
                    <div class='table6'>&bull; PACKINGAN KEMASAN: <span class='table7'>$d[packingan_kemasan]</span></div><br />
			        
                    <div class='table6'>&bull; MOQ:<span class='table7'> $d[moq]</span></div><br />
                    <div class='table6'>&bull; LEAD TIME:<span class='table7'> $d[lead_time]</span></div><br />
					<div class='table6'>&bull; PRICE INDEX:<span class='table7'> $d[price_index]</span></div><br />
					<div class='table6'>&bull; %RIJEK INDEX:<span class='table7'> $d[rijek_index]</span></div><br />
					<a href='aksi.php?module=keranjang&act=tambah&id=$d[id_produk]' class='more'><img src='images/beli.gif' alt='' title='' border='0' /></a>
                    <div class='clear'></div>
                    </div>
                    
                    <div class='box_bottom'></div>
                </div> <div class='clear'></div>
            </div><br /> ";

          
// Produk Lainnya (random)          
  $sql=mysql_query("SELECT * FROM produk ORDER BY rand() LIMIT 4");
      
  echo "<h4 class='heading colr'>Produk Lainnya</h4></div>";
      
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="<span class='prod_cart_habis'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' title='klik untuk memperbesar gambar'></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";
  }
}

// Modul produk per kategori
elseif ($_GET[module]=='detailkategori'){
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
	$tampil=mysql_query("SELECT kd_kategori FROM kategori WHERE id_kategori='$_GET[id]'");
		$kode=print_r(mysql_result($tampil,0),TRUE);
  $tampils=mysql_query("SELECT isi_kategori FROM submenu WHERE kd_kategori='$kode'");
		$kodes=print_r(mysql_result($tampils,0),TRUE);
  echo "<h4 class='heading colr'>Kategori: $n[nama_kategori]</h4></div>
    	  <div class='prod_box_bigx'>
			$kodes\n
            </div>";
  // Tentukan berapa data yang akan ditampilkan per halaman (paging)
  $p      = new Paging3;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);

  // Tampilkan daftar produk yang sesuai dengan kategori yang dipilih
 	$sql = mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]' 
            ORDER BY id_produk DESC LIMIT $posisi,$batas");		 
	$jumlah = mysql_num_rows($sql);

	// Apabila ditemukan produk dalam kategori
	 echo "<h4 class='heading colr2'>==========</h4>";
	if ($jumlah > 0){
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
	
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="<span class='prod_cart_habis'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' title='klik untuk memperbesar gambar'></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";
  }



  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "<div class=halaman>Halaman : $linkHalaman </div><br>";
  }
  else{
    echo "<p align=left><span class='table7'>Belum ada produk pada kategori ini.</p>";
  }
}

// Menu utama di header
//------ Modul halaman statis -----------------------/
	elseif ($_GET['module'] == 'halamanstatis'){  

		$detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='".$val->validasi($_GET['id'],'sql')."'");
		$d   = mysql_fetch_array($detail);
		echo "<h4 class='heading colr'>$d[judul]</h4>
    	  <div class='prod_box_bigx'>
 
            </div>
          <div class='profil'>";
		  if ($d['gambar']!=''){
			echo "<div class='imgl'><img src='foto_banner/$d[gambar]'></div>";
		}
              echo"<div>$d[isi_halaman]</div>
			  <div class='bottom_prod_box_big4'></div>
          </div>    
          </div>
          </div>";
		// Panggil tanggal jika dibutuhkan
		// $tgl = tgl_indo($d['tgl_posting']);

	}
// Modul profil
if ($_GET['module']=='profilkami'){
  // Data profil mengacu pada id_modul=43
	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
	$r      = mysql_fetch_array($profil);

  echo "<h4 class='heading colr'>Profil Kami</h4>
    	  <div class='prod_box_bigx'>
 
            </div>
          <div class='profil'>
              <div>$r[static_content]</div>
			  <div class='bottom_prod_box_big4'></div>
          </div>    
          </div>
          </div>";                             
}

// Modul semua produk
elseif ($_GET[module]=='semuaproduk'){
  echo "<h4 class='heading colr'>Semua Produk</h4>";

  // Tentukan berapa data yang akan ditampilkan per halaman (paging)
  $p      = new Paging2;
  $batas  = 16;
  $posisi = $p->cariPosisi($batas);

  // Tampilkan semua produk
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");

  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="<span class='prod_cart_habis'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' title='klik untuk memperbesar gambar'></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";

  }  
    
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";
}
// Modul hubungi kami
elseif ($_GET['module']=='hubungikami'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<h4 class='heading colr'>Kontak Kami</h4>"; 
  echo "<b> <div class='table5'>Hubungi kami secara online dengan mengisi form di bawah ini:</b>
        <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
        <form action=hubungi-aksi.html method=POST>
        <tr><td><span class='table4'>Nama:</td><td>  <input type=text class='isikoment3' name=nama size=40></td></tr>
        <tr><td><span class='table4'>Email:</td><td>  <input type=text class='isikoment3' name=email size=40></td></tr>
        <tr><td><span class='table4'>Subjek:</td><td>  <input type=text class='isikoment3' name=subjek size=55></td></tr>
        <tr><td valign=top><span class='table4'>Pesan:</td><td><textarea class='isikoment3' name=pesan  style='width: 315px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td><span class=isikomen>(masukkan 6 kode di atas)<br /><input type=text class='isikoment3' name=kode size=10 maxlength=6><br /></td></tr>
        </td><td colspan=2><p style='padding-top:15px ;'><input style=' width: 85px; height: 23px;' type=submit  class=simplebtn value='KIRIM PESAN'></td></tr>
        </form></table><br />";
  echo "</div>
    <div class='bottom_prod_box_big6'></div>
    </div>";            
}


// Modul hubungi aksi
elseif ($_GET['module']=='hubungiaksi'){
  echo "<div id='content'>          
          <div id='content-detail'>";

$nama=trim($_POST[nama]);
$email=trim($_POST[email]);
$subjek=trim($_POST[subjek]);
$pesan=trim($_POST[pesan]);

if (empty($nama)){
  echo "<span class='table8'>Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($email)){
  echo "<span class='table8'>Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($subjek)){
  echo "<span class='table8'>Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($pesan)){
  echo "<span class='table8'>Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
else{
	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<h4 class='heading colr'>Hubungi Kami</h4></span><br />"; 
  echo "<span class='table8'><p align=center><div class='table5'><b>Terima kasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
		}else{
			echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}else{
		echo "<span class='table8'>Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
  echo "</div>
<div class='bottom_prod_box_big9'>
    </div>";            
}



// Modul hasil pencarian produk 
elseif ($_GET['module']=='hasilcari'){
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $p      = new Paging2;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  $cari = "SELECT DISTINCT produk.*,kategori.kd_kategori,kategori.nama_kategori from produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "kd_kategori LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_produk DESC LIMIT $posisi,$batas";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  echo "<h4 class='heading colr'>Hasil Pencarian</h4>";

  if ($ketemu > 0){
  echo "<div class='table3'>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></font> <b>:</b> </div>";
    while($t=mysql_fetch_array($hasil)){
      // Tampilkan hanya sebagian isi produk
      $harga = format_rupiah($t[harga]);
    $disc     = ($t[diskon]/100)*$t[harga];
    $hargadisc     = number_format(($t[harga]-$disc),0,",",".");
    $stok=$t['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$t[id_produk]\">BELI</a>";
    $tombolhabis="<span class='prod_cart_habis'></span>";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$t['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> </span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></br>Kategori : $t[nama_kategori]</span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$t[id_produk]-$t[produk_seo].html'>$t[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$t[id_produk]-$t[produk_seo].html'><a href='foto_produk/$t[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$t[nama_produk]'>
               <img src='foto_produk/$t[gambar]' border='0' height=110 width=114  class='tooltip' title='klik untuk memperbesar gambar'></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$t[id_produk]-$t[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";
      }  

		$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";
    }                                                          
  else{
    echo "<p><div class='table3'>Tidak ditemukan produk dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></p>
	
	 <div class='bottom_prod_box_big_nocari'></div>";
  }
}


// Modul simpan transaksi
elseif ($_GET[module]=='simpantransaksi'){
$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".");

if (empty($_POST[nama]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) || empty($_POST[kota])){
  echo "Data yang Anda isikan belum lengkap<br />
  	    <a href='selesai-belanja.html'><b>Ulangi Lagi</b>";
}
elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "Nama tidak boleh diisi dengan angka atau simbol.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{

}
}

?>
