<?php

use App\Core\Controller;

class Preco extends Controller{

    public function index(){
        $precosModel = $this->model("Precos");
        $precos = $precosModel->listarTodas();
        echo json_encode($precos, JSON_UNESCAPED_UNICODE);
    }
}