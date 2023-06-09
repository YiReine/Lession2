<?php

class FormController extends Controller 
{
	public function show($ma)
	{        
        
        $sp = $this->model("SanphamModel");
        
        $this->view("DetailView", array(
            "title"=>"Chi tiết sản Phẩm",
			"danhmuc"=> $this->getDm(),
            "sp" => $sp->getById($ma)
        ));
    }
	
	public function edit($ma)
	{
		$sp = $this->model("SanphamModel");
        
        $this->view("FormView", array(
            "title"=>"Chỉnh sửa sản Phẩm",
			"id"=>$ma,
			"type"=>"update",
			"danhmuc"=> $this->getDm(),
            "sp" => $sp->getById($ma)
        ));
	}
	
	public function duplicate($ma)
	{
		$sp = $this->model("SanphamModel");
        
        $this->view("FormView", array(
            "title"=>"Copy và tạo sản Phẩm",
			"id"=>$ma,
			"type"=>"save",
			"danhmuc"=> $this->getDm(),
            "sp" => $sp->getById($ma)
        ));
	}
	
	public function create()
	{
		    $this->view("FormView", array(
            "title"=>"Copy và tạo sản Phẩm",
			"type"=>"save",
			"danhmuc"=> $this->getDm()
        ));
	}
	
	public function save()
	{
		$sp = $this->model("SanphamModel");
		$sp->save($_POST,$_FILES);
	}
	
		public function update($ma)
	{
		$sp = $this->model("SanphamModel");
		$sp->update($_POST,$_FILES,$ma);
	}
		
	public function delete($ma)
	{
		$sp = $this->model("SanphamModel");
		$sp->delete($ma);
	}
	
	public function getDmByID($ma)
	{
		
		$dm = $this->model("DanhmucModel");
		
		return $dm->getByID($ma);
		
	}
	
	public function getDm()
	{
		
		$dm = $this->model("DanhmucModel");
		
		return $dm->getAll();
		
	}
}

?>