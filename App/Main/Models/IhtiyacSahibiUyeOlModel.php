<?php
	namespace Models;
	use MS\MSModel;
	class IhtiyacSahibiUyeOlModel extends MSModel{
		function Kaydet(){
			$data["Kaydet"] = 0;
			$data["HataMesaji"] = "";
			if($_POST){
				if(isset($_POST["KullaniciAdi"])){
					$KullaniciAdi = $_POST["KullaniciAdi"];
					if($this->KullaniciAdimi($KullaniciAdi)){
						$data["HataMesaji"].="<li>Lütfen özel karakterler kullanmayın. Örn : türkçe karakterler , noktalama işaretleri</li>";
					}
					$KullaniciAdiKontrol = $this->select("uyeler","KullaniciAdi='$KullaniciAdi'");
					if(count($KullaniciAdiKontrol)>0){
						$data["HataMesaji"].="<li>Bu kullanıcı(<b>".$KullaniciAdi."</b>) adı başka bir kullanıcı tarafından kullanılıyor.</li>";
					}
				}
				else{
					$KullaniciAdi = "";
				}
				if(isset($_POST["Sifre1"])){
					$Sifre1 = md5(md5($_POST["Sifre1"]));
				}
				else{
					$Sifre1 = "";
				}
				if(isset($_POST["Sifre2"])){
					$Sifre2 = md5(md5($_POST["Sifre2"]));
				}
				else{
					$Sifre2 = "";
				}
				if(isset($_POST["Email"])){
					if(filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
						$Email = $_POST["Email"];
						$EmailVarmi = $this->select("uyeler","Email='$Email'");
						
						if(count($EmailVarmi)>0){
							$data["HataMesaji"].="<li>Bu e posta adresi(<b>".$Email."</b>) başka birisi tarafından kullanılıyor.</li>";
						}
					}
					else{
						$Email = "";
						$data["HataMesaji"] .= "<li>Geçerli bir e posta adresi girin.</li>";
					}
				}
				else{
					$Email = "";
				}
				if($Sifre1 != $Sifre2){
					$data["HataMesaji"] .= "<li>Şifreler uyuşmuyor.</li>";
				}
				if(empty($KullaniciAdi) or empty($Sifre1) or empty($Sifre2) or empty($Email)){
					$data["HataMesaji"].="<li>Formda eksik değer bırakmayın.</li>";
				}
				if($data["HataMesaji"] == ""){
					$this->insert("uyeler",false,"'','$KullaniciAdi','$Sifre1','','','$Email','','','2','','0','0'"); // 2 ihtiyaç sahipleri için
					$data["Kaydet"] = 2;
					$data["HataMesaji"] .= '<ul class="hataMesaji hataMesaji2"><li>Kayıt Başarılı. Profil Sayfanıza Yönlendiriliyorsunuz.</li></ul>';
					$data["HataMesaji"] .= ' 	
						<script type="text/javaScript">
						setTimeout(function (){
 
						window.location = "'.$this->site.'/Profil";
						 
						},3000);
						</script>';
					$this->model("LogInOut")->Login($KullaniciAdi, $Sifre1);
				}
				else{
					$data["HataMesaji"] = "<ul class='hataMesaji'>".$data["HataMesaji"]."</ul>";
					$data["Kaydet"] = 1;
				}
			}
			return $data;
		}
		function KullaniciAdimi($K){
			if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $K)) {
				return true;
			}
			else{
				$KullaniciAdi2 = strtolower(str_replace(array(" ","ç","ğ","ı","ö","ş","ü","Ç","Ğ","İ","Ö","Ş","Ü"),array("_","c","g","i","o","s","u","c","g","i","o","s","u"),$K));
				if($KullaniciAdi2 != $K){
					return true;
				}
				return false;
			}
		}
	}
?>