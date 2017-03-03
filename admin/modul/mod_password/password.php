<?php
echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>SETTING PASSWORD</h1>
   </div>
   <div class='block-content'>	
	
	<form method=POST action=modul/mod_password/aksi_password.php>

   <p class=inline-small-label> 
   <label for=field4>Masukkan Password Lama</label>
   <input type=text name='pass_lama' size=60>
   </p> 	
	<p class=inline-small-label> 
   <label for=field4>Masukkan Password Baru</label>
   <input type=text name='pass_baru' size=60>
   </p>
   <p class=inline-small-label> 
   <label for=field4>Masukkan Lagi Password Baru</label>
   <input type=text name='pass_ulangi' size=60>
   </p>
		
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
    <a class='button red' id=reset-validate-form href='?module=home'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
   

/*
    echo "<h2>Ganti Password</h2>
          <form method=POST action=modul/mod_password/aksi_password.php>
          <table>
          <tr><td>Masukkan Password Lama</td><td> : <input type=text name='pass_lama'></td></tr>
          <tr><td>Masukkan Password Baru</td><td> : <input type=text name='pass_baru'></td></tr>
          <tr><td>Masukkan Lagi Password Baru</td><td> : <input type=text name='pass_ulangi'></td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value=Proses>
                            <input type=button class='tombol' value=Batalkan onclick=self.history.back()></td></tr>
          </table></form>";*/
?>
