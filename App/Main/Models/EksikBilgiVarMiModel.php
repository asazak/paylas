<?php
	namespace Models;
	use MS\MSModel;
	class EksikBilgiVarMiModel extends MSModel{
		function Kontrol(){
			$B = $this->model("LogInOut")->GetLoginedUser();;
			$B = $B[0];
			if(empty()
		}
	}
?>