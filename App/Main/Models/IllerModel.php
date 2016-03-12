<?php
	namespace Models;
	use MS\MSModel;
	class IllerModel extends MSModel{
		function iller(){
			$data["iller"] = $this->select("iller");
			return $data;
		}
	}
?>