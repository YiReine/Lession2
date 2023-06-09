<?php

class SanphamController extends Controller 
{
	public function show(){        
        
        $sp = $this->model("SanphamModel");
        
		if (!isset ($_GET['page']) ) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}
		
		$temp =  $sp->getAll($page);
		$list = $temp['sp'];
		
        $this->view("SanphamView", array(
            "title"=>"Sản Phẩm",
			"nop"=>$temp['nop'],
            "sp" => $list
        ));
    }
	
	public function search(){        
        
        $sp = $this->model("SanphamModel");
		
		$list =  array();
		if(isset($_POST["search"])){
			$ten = $_POST["search"];
			if ($this->searchDM($ten)){
				$ten = $this->searchDM($ten);
				$list =  $sp->search($ten['ma']);
			}
			else {
				$list =  $sp->search($ten);	
			}
			
		}
        
        $this->view("SanphamView", array(
            "title"=>"Sản Phẩm",
            "sp" => $list
        ));
    }
	
	public function getDmByID($ma){
		
		$dm = $this->model("DanhmucModel");
		
		return $dm->getByID($ma);
		
	}
	
	public function searchDm($ten){
		
		$dm = $this->model("DanhmucModel");
		
		return $dm->search($ten);
		
	}	
	
}

?>