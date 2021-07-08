<?php

use App\Core\Model;

class Precos{
    public $id;
    public $descricao;

    public function listAll(){
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

    public function create($firstHour, $secondHour, $init){
        $sql = "INSERT INTO precos(primeiraHora, demaisHoras, iniciovingencia) VAlUES(?, ?, ?)";
        $stmt = Model::getConexao() -> prepare($sql);
        $stmt->bindValue(1, $firstHour);
        $stmt->bindValue(2, $secondHour);
        $stmt->bindValue(3, $init);
        
        $result = $stmt->execute();
        
        if($result){
            return $result;
        }else{
            return false;
        }
        
    }

}