<?php

use App\Core\Model;

class Carros
{
    public $id;
    public $placa;
    public $proprietario;
    public $entrada;
    public $saida;
    public $valorpago;
    public $id_preco;

    public function listAll()
    {
        $sql = "SELECT * FROM carros";

        $stmt = Model::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } else {
            return [];
        }
    }

    public function insert()
    {
        $sql = "INSERT INTO carros(placa, proprietario, entrada, id_preco, saida) VAlUES(?, ?, ?, ?, ?)";
        $stmt = Model::getConexao()->prepare($sql);

        $stmt->bindValue(1, $this->placa);
        $stmt->bindValue(2, $this->proprietario);
        $stmt->bindValue(3, $this->entrada);
        $stmt->bindValue(4, $this->id_preco);
        $stmt->bindValue(5, $this->saida);

        if ($stmt->execute()) {
            $this->id = Model::getConexao()->LastInsertId();
            return $this->id;
        } else {
            return false;
        }
    }

    public function FindById($id){
        $sql = "SELECT * FROM carros WHERE idcarro=?";
        $stmt = Model::getConexao()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        if($stmt -> rowCount() > 0){
            $result = $stmt -> fetchAll(PDO::FETCH_OBJ);
            return $result;
        }else{
            return [];
        }
    }

    public function update()
    {
        $sql = "UPDATE carros SET saida = ?, valor_total = ? where id=?";
        $stmt = Model::getConexao()->prepare($sql);

        $stmt->bindValue(1, $this->saida);
        $stmt->bindValue(2, $this->valorpago);
        $stmt->bindValue(3, $this->id);

        return $stmt->execute();
    }
}
