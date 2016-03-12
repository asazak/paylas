<section>
	<h2>İhtiyaç Sahibi Kayıt</h2><br/><br/>
	<?php
		if($Kaydet == 0){}
		else if($Kaydet == 1){
			echo $HataMesaji;
		}
		else{
			echo $HataMesaji;
		}
	?>
	<div class="kayit">
		<form action="" method="post">
			Kullanıcı Adı : <input type="text" name="KullaniciAdi" /> <br/>
			Şifre : <input type="password" name="Sifre1" /> <br/>
			Şifre Tekrar : <input type="password" name="Sifre2" /> <br/>
			E posta : <input type="text" name="Email"/> <br/>
			<input type="submit" value="Kaydol"/>
		</form>
	</div>
</section>