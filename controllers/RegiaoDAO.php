<?php

require_once __DIR__ . "/pdo_conexao.php";

class RegiaoDAO
{
  public function create(Regiao $regiao)
  {

    try {
      $sql = 'INSERT INTO tregiao (TREGIAO_NOME, TREGIAO_STATUS) VALUE (?,?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $regiao->getNome());
      $stmt->bindValue(2, $status->getStatus());

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

      $sql = "UPDATE tregiao SET TREGIAO_NOME=? TEQUIPE_STATUS=? WHERE TREGIAO_ID_PK='$id'";
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $regiao->getNome());
      $stmt->bindValue(2, $regiao->getStatus());
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
  // Filtra regiao Ativas
  public function readEnable()
  {
    try {

      $sql = 'SELECT * FROM tregiao WHERE  TREGIAO_STATUS="1"';
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

  // Filtra regiao Inativas
  public function readDisable()
  {
    try {

      $sql = 'SELECT * FROM tregiao WHERE  TREGIAO_STATUS="0"';
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





}
