<section>
	<?php
		$Uye = $UyeBilgileri[0];
		if($Uye["Tip"] == 2){
		?>
		<a href="<?php echo get::site(); ?>/Profil/BilgileriDuzenle">Bilgierinizi Düzenleyin</a>
		<a href="<?php echo get::site(); ?>/IhtiyacEkle">Neye ihtiacınız var. Burdan ekleyin</a>
		<?php
		}
	?>
</section>