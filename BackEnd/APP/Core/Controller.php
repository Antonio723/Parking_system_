<?php
namespace App\Core;

class Controller{
    public $request;

    public function __construct(){
        $this->request = $this->getRequestBody();
        
    }

    public function model($model){
        require_once("../App/Model/".$model.".php");
        return new $model;
    }

    protected function getRequestBody(){
        $json = file_get_contents("php://input");
        $obj = json_decode($json, true);
        $result =(new request($obj));

        return $result;
    }
    
}