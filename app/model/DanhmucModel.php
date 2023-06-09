<?php

class DanhmucModel extends Database
{
	public function getAll()
	{
		$qr = "SELECT * FROM danhmuc";
		$rs = $this->run($qr);
		return $rs;
	}
	
	public function getByID($id)
	{
		$qr = "SELECT ten FROM danhmuc WHERE ma = '".$id."'";
		$rs = $this->run($qr);
		$name = $rs->fetch_assoc();
		return $name['ten'];
	}
	
	public function search($ten)
	{
		$qr = "SELECT * FROM danhmuc WHERE LOWER(ten) LIKE LOWER('%".$ten."%')";
		$rs = $this->run($qr);
		if(!empty($rs))
			$row = $rs->fetch_assoc();
		return $row;
	}	
	
}

?>