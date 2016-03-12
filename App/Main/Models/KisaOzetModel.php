<?php
	namespace Models;
	use MS\MSModel;
	class KisaOzetModel extends MSModel{
		function Ozet($UyeId){
			$data["KisaOzet"] = $this->select("");
		}
	}
?>