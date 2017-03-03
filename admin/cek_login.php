<?php
include "../config/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));

$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  
  header('location:media.php?module=home');
}
else{
 echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>LOGIN GAGAL</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Username atau Password anda tidak sesuai.<br>
  Atau akun anda sedang diblokir.</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";

}
?>
