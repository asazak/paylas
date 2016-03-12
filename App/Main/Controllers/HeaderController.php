<?php
	namespace Controllers;
	use MS\MSController;
	class Header extends MSController{
		function actionIndex(){
			if($this->model("LogInOut")->IsLogin()){
				$data = $this->model("LogInOut")->GetLoginedUser();
				$data["EksikBilgiVar"] = $this->Kontrol($data["UyeBilgileri"]);
				$this->view("UserHeader",$data);
			}
			else{
				$this->view("StandartHeader");
			}
		}
		function Kontrol($UyeBilgileri){
			$U = $UyeBilgileri[0];
			extract($U);
			if(empty($Ad) or empty($Soyad) or empty($CepTel) or empty($Tc) or $IlId == 0){
				return true;
			}
			else if($Tip == 2 and empty($KisaOzet)){
				return true;
			}
			return false;
		}
	}
?>