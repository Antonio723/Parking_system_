<?php

use App\Core\Model;

class Precos{
    public $id;
    public $descricao;

    public function listarTodas(){
        $sql = "SELECT * FROM precos";
        $stmt = Model::getConexao() -> prepare($sql);
        $stmt->execute();

        if($stmt -> rowCount() >0){
            $resultado = $stmt -> fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }else{
            return [];
        }
    }
}