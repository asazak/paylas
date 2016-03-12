<?php
	namespace Models;
	use MS\MSModel;
	use MS\Session;
	class LogInOutModel extends MSModel{
		function Login($KullaniciAdi = false, $Sifre = false){
			if($KullaniciAdi and $Sifre and is_string($KullaniciAdi) and is_string($Sifre)){
				$Kontrol = $this->select("uyeler","KullaniciAdi='$KullaniciAdi' and Sifre='$Sifre'");
				if(count($Kontrol)>0){
					Session::set("PaylasGiris",true);
					Session::set("PaylasUyeId",$Kontrol[0]["UyeId"]);
					Session::set("PaylasKullaniciAdi",$Kontrol[0]["KullaniciAdi"]);
					Session::set("PaylasSifre",$Kontrol[0]["Sifre"]);
					return true;
				}
				return false;
			}
			return false;
		}
		function LogOut(){
			Session::set("PaylasGiris",false);
			Session::set("PaylasUyeId",false);
			Session::set("PaylasKullaniciAdi",false);
			Session::set("PaylasSifre",false);
			return true;
		}
		function IsLogin(){
			$PaylasGiris = Session::get("PaylasGiris");
			$PaylasUyeId = Session::get("PaylasUyeId");
			$PaylasKullaniciAdi = Session::get("PaylasKullaniciAdi");
			$PaylasSifre = Session::get("PaylasSifre");
			if($PaylasGiris and $PaylasUyeId and $PaylasKullaniciAdi and $PaylasSifre){
				$Kontrol = $this->select("uyeler","UyeId='$PaylasUyeId' and KullaniciAdi='$PaylasKullaniciAdi' and Sifre='$PaylasSifre'");
				if(count($Kontrol)>0){
					return true;
				}
				return false;
			}
			return false;
		}
		function GetLoginedUser(){
			if($this->IsLogin()){
				$UyeId = Session::get("PaylasUyeId");
				$data["UyeBilgileri"] = $this->select("uyeler","UyeId='$UyeId'");
			}
			else{
				$data = array();
			}
			return $data;
		}
	}
?>