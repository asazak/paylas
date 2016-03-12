<?php
	namespace Controllers;
	use MS\MSController;
	class IhtiyacSahibiUyeOl extends MSController{
		function actionIndex(){
			$this->controller("Header");
			$data = $this->model("IhtiyacSahibiUyeOl")->Kaydet();
			$this->view("IhtiyacSahibiUyeOl",$data);
		}
	}
?>