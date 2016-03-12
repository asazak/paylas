<?php
	namespace Controllers;
	use MS\MSController;
	use MS\Acl;
	class LogOut extends MSController{
		function __construct(){
			parent::__construct();
			$this->acl = new Acl();
			$this->acl->setAccess(array(
				array(
					"actions" => array("actionIndex"),
					"expression" => $this->model("LogInOut")->IsLogin(),
					"redirect" => "Main"
				)
			));
		}
		function actionIndex(){
			$this->model("LogInOut")->LogOut();
			echo "Çıkış yaptınız. Yönlendiriliyorsunuz.";
			echo '<html><head><meta charset="utf-8"/></head><body>
			<script type="text/javaScript">
			setTimeout(function (){

			window.location = "'.$this->site.'";
			 
			},3000);
			</script></body></html>';
		}
	}
?>