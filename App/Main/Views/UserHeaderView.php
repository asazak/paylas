<!DOCTYPE html>
<html>
	<head>
		<title>Yardımlaşma Sitesi</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="<?php echo get::site(); ?>/css/reset.css"/>
		<link rel="stylesheet" href="<?php echo get::site(); ?>/css/style.css"/>
		<script type="text/javascript" src="<?php echo get::site(); ?>/js/jquery.js"></script>
		<script type="text/javascript"> var site = "<?php echo get::site(); ?>";</script>
	</head>
	<body>
		<div class="main">
			<header>
				<div class="logo">
					<a href="<?php echo get::site(); ?>">Logo</a>
				</div>
				Hoşgeldiniz <a href="<?php echo get::site(); ?>/Profil/Detay/<?php echo $UyeBilgileri[0]["KullaniciAdi"]; ?>"><?php echo $UyeBilgileri[0]["KullaniciAdi"]; ?></a>
				<?php
					if($EksikBilgiVar){
					?>
					Bazı bilgileriniz eksik. Lütfen<a href="<?php echo get::site(); ?>/Profil/BilgileriDuzenle"> burayı </a> tıklayarak size yardımcı olabilmemiz için bu eksik bilgleri doldurun.
					<?php
					}
				?>
			</header>