<?php
	namespace Controllers;
	use MS\MSController;
	use MS\Acl;
	class Giris extends MSController{
		function __construct(){
			parent::__construct();
			$this->acl = new Acl();
			$this->acl->setAccess(array(
				array(
					"actions" => array("actionIndex"),
					"expression" => !$this->model("LogInOut")->IsLogin(),
					"redirect" => "Main"
				)
			));
		}
		function actionIndex(){
			if(isset($_POST["KullaniciAdi"])){
				$KullaniciAdi = $_POST["KullaniciAdi"];
				$KullaniciAdi = strtolower(str_replace(array(" ","ç","ğ","ı","ö","ş","ü","Ç","Ğ","İ","Ö","Ş","Ü","'",'"'),array("_","c","g","i","o","s","u","c","g","i","o","s","u","",""),$KullaniciAdi));
			}
			else{
				$KullaniciAdi = "";
			}
			if(isset($_POST["Sifre"])){
				$Sifre = md5(md5($_POST["Sifre"]));
			}
			else{
				$Sifre = "";
			}
			$Gir = $this->model("LogInOut")->Login($KullaniciAdi, $Sifre);
			if($Gir){
				$this->view("GirisBasarili");
			}
			else{
				$this->view("GirisBasarisiz");
			}
		}
	}
?>