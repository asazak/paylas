<?php
	namespace Controllers;
	use MS\MSController;
	use MS\Acl;
	class Profil extends MSController{
		function __construct(){
			$this->acl = new Acl();
			$this->acl->setAccess(array(
				array(
					"actions" => array("actionIndex","BilgileriDuzenle"),
					"expression" => $this->model("LogInOut")->IsLogin(),
					"redirect" => "Main"
				)
			));
		}
		function before(){
			$this->controller("Header");
		}
		function BilgileriDuzenle(){
			if($_POST){
				$this->model("Uye")->PostBilgiGuncelle();
			}
			$data = $this->model("LogInOut")->GetLoginedUser();
			$data = array_merge($data,$this->model("Iller")->iller());
			$this->view("ProfilDuzenle",$data);
		}
		function actionIndex(){
			$data = $this->model("ProfilSection")->Veriler();
			$this->view("ProfilSection",$data);
		}
	}
?>