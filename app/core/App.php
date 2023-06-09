<?php
class App
{

    protected $controller="SanphamController";
    protected $action="show";
    protected $params=array();

    function __construct()
	{
 
        $arr = $this->urlProcess();
		
        if (file_exists("./app/controller/".$arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./app/controller/". $this->controller .".php";
        $this->controller = new $this->controller;

        
        if (isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
		
        $this->params = $arr?array_values($arr):array();

        call_user_func_array(array($this->controller, $this->action), $this->params);

    }

    function urlProcess()
	{
        if (isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>