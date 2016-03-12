<section>
	<form action="" method="post">
		<?php
			$UyeBilgileri = $UyeBilgileri[0];
		?>
		<input type="text" name="KullaniciAdi" value="<?php echo $UyeBilgileri["KullaniciAdi"]; ?>" disabled /> <br/>
		<input type="text" name="Email" value="<?php echo $UyeBilgileri["Email"]; ?>" disabled /> <br/>
		<input type="text" name="Ad" value="<?php echo $UyeBilgileri["Ad"]; ?>" <?php if($UyeBilgileri["Ad"] == ""){ ?> placeholder="Adınız" <?php } else{ ?> disabled="disabled" <?php } ?>/> <br/>
		<input type="text" name="Soyad" value="<?php echo $UyeBilgileri["Soyad"]; ?>" <?php if($UyeBilgileri["Soyad"] == ""){ ?> placeholder="Soyadınız" <?php } else{ ?> disabled="disabled" <?php } ?>/> <br/>
		<input type="text" name="CepTel" value="<?php if($UyeBilgileri["CepTel"] == ""){  } else{ echo $UyeBilgileri["CepTel"]; } ?>" <?php if($UyeBilgileri["CepTel"] == ""){ ?> placeholder="Cep telefon numaranız" <?php } else{ ?> disabled="disabled" <?php } ?>/> <br/>
		<input type="text" name="Tc" value="<?php if($UyeBilgileri["Tc"] == 0){  } else{ echo $UyeBilgileri["Tc"]; } ?>" <?php if($UyeBilgileri["Tc"] == 0){ ?> placeholder="Tc Kimlik Numaranız" <?php } else{ ?> disabled="disabled" <?php } ?>/> <br/>
		<select name="IlId" <?php if($UyeBilgileri["IlId"] != 0){ ?> disabled <?php } ?>>
			<option value="0">İlinizi Seçiniz</option>
			<?php
				foreach($iller as $il){
				?>
				<option value="<?php echo $il["IlId"]; ?>" <?php if($il["IlId"] == $UyeBilgileri["IlId"]){ ?> selected <?php } ?>><?php echo $il["IlAdi"]; ?></option>
				<?php
				}
			?>
		</select>
		<br/>
		<?php
			if($UyeBilgileri["Tip"] == 2){
			?>
			<textarea name="KisaOzet" placeholder="Sizinle ilgili kısa bir özet"><?php echo $UyeBilgileri["KisaOzet"]; ?></textarea> <br/><br/><br/>
			<?php
			}
		?>
		<input type="submit" value="Kaydet" />
	</form>
</section>