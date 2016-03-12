<?php
	namespace Models;
	use MS\MSModel;
	class ProfilSectionModel extends MSModel{
		function Veriler(){
			$UyeBilgileri = $this->model("LogInOut")->GetLoginedUser();
			$data["UyeBilgileri"] = $UyeBilgileri["UyeBilgileri"];
			return $data;
		}
	}
?>