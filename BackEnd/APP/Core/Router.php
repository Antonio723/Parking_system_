<?php

namespace App\Core;

class Router{
    private $controller;
    private $httpMethod = "GET";
    private $controllerMethod;
    private $params = [];

    function __construct(){

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Content-Type");
        header("content-type: application/json");
        
        $url = $this->parseURL();
        if (isset($url[1]) && file_exists("../App/Controller/" . $url[1] . ".php")) {
           
            $this->controller = $url[1];
            unset($url[1]);

        } elseif(empty($url[1])){
            echo "Bem vindo a FastParking API";
            exit;
        }else{
            echo json_encode(["erro" => "Parece que esse link está errado, verifique e tente novamente"], JSON_UNESCAPED_UNICODE);
            exit;
        }

        require_once "../App/Controller/" . $this->controller . ".php";

        $this->controller = new $this->controller;

        $this->httpMethod = $_SERVER["REQUEST_METHOD"];

        switch ($this->httpMethod) {
            
            case "GET":
                if (!isset($url[2])) {
                    $this->controllerMethod = "index";
                } elseif (is_numeric($url[2])) {
                    $this->controllerMethod = "find";
                    $this->params = [$url[2]];
                } else {
                    http_response_code(400);
                    echo json_encode(["erro" => "Parametro Invalido"], JSON_UNESCAPED_UNICODE);
                    exit;
                }

            break;

            case "POST":
                $this->controllerMethod = "store";
            break;

            case "PUT":
                $this->controllerMethod = "update";
                $this->getParams($url);
            break;
                
            case "DELETE":
                $this->controllerMethod = "delete";
                $this->getParams($url);
                
            break;

            default:
                echo "Método não habilitado";
                exit;
            }
            call_user_func_array([$this->controller, $this->controllerMethod], $this->params);
        }
        
        private function parseURL()
    {
        return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }
    
    private function getParams($url){
        if (!isset($url[2])) {
            http_response_code(400);
            echo json_encode(["erro" => "Parametro não informado"], JSON_UNESCAPED_UNICODE);
            exit;
        } elseif (is_numeric($url[2])) {
            $this->params = [$url[2]];
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Parametro Invalido"], JSON_UNESCAPED_UNICODE);
            exit;
        }

    }


}