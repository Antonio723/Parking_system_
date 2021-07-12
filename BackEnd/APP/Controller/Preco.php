<?php

use App\Core\Controller;

class Preco extends Controller{

    public function index(){
        $precosModel = $this->model("Precos");
        $precos = $precosModel->getLastRecord();

        if (!$precos) {
            http_response_code(204);
            echo json_encode('valor nao cadastrado', JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo json_encode($precos, JSON_UNESCAPED_UNICODE);
    }

    public function find($id){
        $precosModel = $this->model("Precos");
        $precos = $precosModel->findById($id);
        if ($precos) {
            http_response_code(200);
            echo json_encode($precos, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["Erro" => "O parametro não está cadastrado"], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
        }
    }

    public function store(){
        $novoPreco = $this->getRequestBody();
        $precoModel = $this->model("Precos");
        
        $precoModel->primeiraHora = $novoPreco->primeiraHora;
        $precoModel->demaisHoras = $novoPreco->demaisHoras;

        $precoModel = $precoModel->create();

        if ($precoModel) {
            http_response_code(201);
            echo json_encode( ["id" => $precoModel], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["Erro" => "Erro ao cadastrar novo preço"], JSON_UNESCAPED_UNICODE);
            http_response_code(500);
        }
    }
}
