<?php

use App\Core\Controller;

class Carro extends Controller{
    
    public function index(){
        $resgitrosModel = $this->model("Carros");
        $lista = $resgitrosModel->listAll();
        echo json_encode($lista, JSON_UNESCAPED_UNICODE);
    }

    public function store(){
        $resgitrosModel = $this->model("Carros");

        $resgitrosModel->placa = $this->request->placa;
        $resgitrosModel->proprietario = $this->request->proprietario;
        $resgitrosModel->entrada = $this->request->entrada;
        $resgitrosModel->id_preco = $this->request->id_preco;
        $resgitrosModel->saida = $this->request->valor_total;
        $resgitrosModel->saida = $this->request->saida;

        
        $status = $resgitrosModel->insert();

        if($status){
            http_response_code(204);
        }else{
            http_response_code(500);
            json_encode(["erro"=>"Erro ao inserir registro"], JSON_UNESCAPED_UNICODE);
        }
    }

    public function find($id){
        $carrosModel = $this->model("Carros");
        $precos = $carrosModel->findById($id);
        if ($precos) {
            http_response_code(200);
            echo json_encode($precos, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["Erro" => "O parametro não está cadastrado"], JSON_UNESCAPED_UNICODE);
            http_response_code(400);
        }

    }
    
    public function delete($id){
        $modelcarros = $this->model("carros");

        $modelcarros = $modelcarros->findById($id);
        
        if(!$modelcarros){
            http_response_code(404);
            echo json_encode(["erro"=>"O carro não está no estacionamento"],JSON_UNESCAPED_UNICODE);
            exit;
        }

        $modelcarros = $this->calcularValor($modelcarros);

        $modelcarros->upadte();

        echo json_encode($modelcarros, JSON_UNESCAPED_UNICODE);
    }

    private function calcularValor($cliente){
        $cliente = $cliente[0];

        $dateIn = DateTime::createFromFormat("Y-m-d H:i:s", $cliente->entrada);
        $dateOut = new DateTime();
        $total = $dateOut->diff($dateIn);

        $hours = 0;
        if($total->d>0){
            $hours = $hours + $total->d * 24;
        }

        $hours = $hours + $total->h;

        if($total->i >10){
            $hours += 1;
        }

        $precoModel = $this->model("Precos");
        $precoModel->findById($cliente->id_preco);
        $cliente->valor_total = $precoModel->valorprimeriahora;

        $hours--;

        if($hours > 0){
            $cliente->valor_total = $precoModel->valordemaishoras * $hours;
        }

        $cliente->saida = $dateOut->format('Y-m-d H:i:s');

        return $cliente;
    }


}