<?php
class Controller
{

    public function model($model)
	{
        require_once "app/model/".$model.".php";
        return new $model;
    }

    public function view($view, $data=array())
	{
        require_once "app/view/".$view.".php";
    }

}
?>