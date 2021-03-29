<form action="home_insert.php" method="post">
        	<table align="left">
                	<tr>
                       	<td>
                        	<font face="Tohama" color="black" size="2">
                        	Tanggal
							</font>
							<td>:</td>
							<td>
                       		<input type="text" id="tgl" name="tgl" size="30" title="Pilih tanggal."/>	
                        </td>
                   </tr>
                  
				 
				   	<tr>
                       	<td>
                        	<font face="Tohama" color="black" size="2">
                        	Nama
							</font>
							<td>:</td>
							
							
							<td valign="top"><select name="nama[ ]"  size="20 multiple" multiple="multiple" title="Silahkan pilih nama staf">';
														
								$q=mysql_query("select * from user where user_id > 1 order by fullname asc");
								if ($q)
								{
									while ($r=mysql_fetch_array($q))
									{
										?>
										<option value="<?php echo $r[user_id]; ?>"><?php echo $r[fullname]; ?></option>
										<?php
									}
								}
								echo '</select>
								</td>
                   </tr>
                  
                   	<tr>
                    	<td>
                        <font face="Tohama" color="black" size="2">
                        Agenda
                        </font>
                        </td>
                        <td>:</td>
                        <td>
						<textarea id="agenda" name="agenda" title="Ketikkan Agenda Kamu disini." cols=35 rows=3></textarea>
                        <span id="hitung">90</span> <font color=white>Karakter tersisa</font></td>
						
                    </tr>
                  
				 
				   	<tr>
                    	<td>
                        <font face="Tohama" color="black" size="2">
                        Keterangan
                        </font>
                        </td>
                        <td>:</td>
                        <td>
                        <textarea id="keterangan" name="keterangan" title="Ketikkan Keterangan disini." cols=35 rows=3></textarea>
                        <span id="hitung1">85</span> <font color=white>Karakter tersisa</font></td>
						
                    </tr>
                  
					
                   <tr>
                   		<td></td>
                        <td></td>
                        <td>
                        <input type="submit" value="Tambah" title="Klik tambah untuk menambahkan Agenda.">
                        <input type="reset" value="Bersihkan" title="Klik bersihkan untuk mengosongkan form.">                       
                        <a href="home.php"><input TYPE="button" VALUE="Kembali" title="Klik kembali untuk ke halaman sebelumnya."></a>                     
                        </td>
                   </tr>
  	 	</table>
	</form>;
