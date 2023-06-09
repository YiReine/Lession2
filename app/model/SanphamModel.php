<?php

class SanphamModel extends Database
{
	public function getAll($page)
	{
		$results_per_page = 10;
		
		$query = "SELECT * FROM sanpham";

		$result = $this->run($query);

		$number_of_result = mysqli_num_rows($result);
		
		$number_of_page = ceil ($number_of_result / $results_per_page);
		
		$page_first_result = ($page-1) * $results_per_page;


		$qr = "SELECT * FROM sanpham LIMIT " . $page_first_result . "," . $results_per_page*$page;
				
		#$qr = "SELECT * FROM sanpham";
		$rs = $this->run($qr);
		return array("nop" => $number_of_page, "sp" => $rs);
	}
	
	public function getByID($id)
	{
		$qr = "SELECT * FROM sanpham WHERE ma = '".$id."'";
		$rs = $this->run($qr);
		$row = $rs->fetch_assoc();
		return $row;
	}
	
	public function save($data,$file){
			$TEN = $data['ten'];
			$DANHMUC = $data['danhmuc'];


			$file_name = $file['anh']['name'];
			$file_size = $file['anh']['size'];
			$file_temp = $file['anh']['tmp_name'];

		
		print_r($file);
		
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "public/img/".$unique_image;
			
		
			if( $TEN=="" || $DANHMUC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}else{
				
				if(!empty($file_name)){
					
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO sanpham(ten, danhmuc, anh) 
							  VALUES('$TEN', '$DANHMUC', '$unique_image')";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "INSERT INTO sanpham(ten, danhmuc) 
							  VALUES('$TEN', '$DANHMUC')";
					
				}
				
				$result = $this->run($query);
				
			}
		echo "aaaaaa";
		header("Location: ".BASEURL);
	}
	
	public function update($data,$file,$id){
			$TEN = $data['ten'];
			$DANHMUC = $data['danhmuc'];


			$file_name = $file['anh']['name'];
			$file_size = $file['anh']['size'];
			$file_temp = $file['anh']['tmp_name'];

		
		print_r($file);
		
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "public/img/".$unique_image;
			
		
			if( $TEN=="" || $DANHMUC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}else{
				
				if(!empty($file_name)){
					
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE sanpham
							  SET ten = '$TEN', danhmuc = '$DANHMUC', anh = '$unique_image'
							  WHERE ma = '".$id."'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE sanpham
							  SET ten = '$TEN', danhmuc = '$DANHMUC'
							  WHERE ma = '".$id."'";
					
				}
				
				$result = $this->run($query);
				
			}
		
		header("Location: ".BASEURL);
	}
		
	public function delete($id)
	{
		$qr = "DELETE FROM sanpham WHERE ma = '".$id."'";
		$rs = $this->run($qr);
		header("Location: ".BASEURL);
	}	
		
	public function search($ten)
	{
		$qr = "SELECT * FROM sanpham WHERE LOWER(ten) LIKE LOWER('%".$ten."%') OR danhmuc = '".$ten."'";
		$rs = $this->run($qr);
		return $rs;
	}	
	
}

?>