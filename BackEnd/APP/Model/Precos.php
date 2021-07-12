<?php

use App\Core\Model;

class Precos{
    public $id;
    public $valorprimeriahora;
    public $valordemaishoras;

    public function getLastRecord(){
        $sql = "SELECT * FROM precos ORDER BY 1 DESC LIMIT 1";

        $stmt = Model::getConexao() -> prepare($sql);
        $stmt->execute();

        if($stmt -> rowCount() >0){
            $resultado = $stmt -> fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }else{
            return [];
        }
    }

    public function create(){
        $sql = "INSERT INTO precos(primeiraHora, demaisHoras, iniciovingencia) VAlUES(?, ?, ?)";
        $stmt = Model::getConexao() -> prepare($sql);
        $stmt->bindValue(1, $this->primeiraHora);
        $stmt->bindValue(2, $this->demaisHoras);
        $stmt->bindValue(3, date("Y-m-d"));
        
        if($stmt->execute()){
            $this->id = Model::getConexao()->LastInsertId();
            return $this->id;
        }else{
            return false;
        }
        
    }

    public function findById($id){
        $sql = "SELECT * FROM precos where idpreco = ?";
        $stmt = Model::getConexao() -> prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt -> rowCount() >0){
            $resultado = $stmt -> fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }else{
            return [];
        }
    }


}