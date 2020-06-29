<?php

require_once __DIR__ . "/pdo_conexao.php";

class RegiaoDAO
{
  public function create(Regiao $regiao)
  {

    try {
      $sql = 'INSERT INTO tregiao (TREGIAO_NOME) VALUE (?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $regiao->getNome());

      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function read()
  {
    try {

      $sql = 'SELECT * FROM tregiao';
      $stmt = Conect::getConn()->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
      } else {
        return [];
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function readForId($id)
  {
    try {

      $sql = "SELECT * FROM tregiao WHERE TREGIAO_ID_PK='$id'";
      $stmt = Conect::getConn()->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
      } else {
        return [];
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function upDate(Regiao $regiao, $id)
  {
    try {

      $sql = "UPDATE tregiao SET TREGIAO_NOME=? WHERE TREGIAO_ID_PK='$id'";
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $regiao->getNome());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tregiao WHERE TREGIAO_ID_PK=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
