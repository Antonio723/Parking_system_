<?php

use App\Core\Controller;

class Preco extends Controller{

    public function index(){
        $precosModel = $this->model("Precos");
        $precos = $precosModel->listAll();
        echo json_encode($precos, JSON_UNESCAPED_UNICODE);
    }

    public function find($id){
        $precosModel = $this->model("Precos");
        $precos = $precosModel->findById($id);
        if($precos){
            http_response_code(200);
            echo json_encode($precos, JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(["Erro"=>"O parametro não está cadastrado"], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
        }
    }

    public function store(){
        $json = file_get_contents("php://input");
        $novacategoria = json_decode($json);

        $precoModel = $this->model("Precos");

        $precoModel->primeiraHora = $novacategoria->primeiraHora;
        $precoModel->demaisHoras = $novacategoria->demaisHoras;
        $precoModel->inicioVingencia = $novacategoria->inicioVingencia;

        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $precoModel->inicioVingencia)) {
            $precoModel = $precoModel->create($precoModel->primeiraHora, $precoModel->demaisHoras, $precoModel->inicioVingencia);
        
            if($precoModel){
                http_response_code(201);
                echo json_encode($precoModel, JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(["Erro"=>"Erro ao cadastrar novo preço"], JSON_UNESCAPED_UNICODE);
                http_response_code(400);
            }
        } else {
            echo json_encode(["Erro"=>"A data de inicio de vingencia está incorreta"], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
        }

    }

    

}