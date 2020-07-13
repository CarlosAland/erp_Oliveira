<?php

require_once __DIR__ . "/pdo_conexao.php";

class LtDAO
{
  public function create(Lt $lt)
  {

    try {
      $sql = 'INSERT INTO tlt(TLT_NOME, TLT_LOCAL, TLT_SIGLA, TLT_REGIAO_FK, TLT_STATUS)
      VALUE (?, ?, ?, ?, ?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $lt->getNome());
      $stmt->bindValue(2, $lt->getLocal());
      $stmt->bindValue(3, $lt->getSigla());
      $stmt->bindValue(4, $lt->getRegiao());
      $stmt->bindValue(5, $lt->getStatus());

      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function read()
  {
    try {

      $sql = 'SELECT * FROM tlt';
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

      $sql = "SELECT * FROM tlt WHERE TLT_ID_PK='$id'";
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

  public function upDate(Lt $lt, $id)
  {
    try {

      $sql = "UPDATE tlt SET TLT_NOME=?, TLT_LOCAL=?, TLT_SIGLA=?,
      TLT_REGIAO_FK=? WHERE TLT_ID_PK='$id'";
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $lt->getNome());
      $stmt->bindValue(2, $lt->getLocal());
      $stmt->bindValue(3, $lt->getSigla());
      $stmt->bindValue(4, $lt->getRegiao());
      $stmt->bindValue(5, $lt->getStatus());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tlt WHERE TLT_ID_PK=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  // filtra os ativos
  public function readEnable()
  {
    try {

      $sql = 'SELECT * FROM tlt where TLT_STATUS="1"';
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
  // filtra os inativos
  public function readDisable()
  {
    try {

      $sql = 'SELECT * FROM tlt where TLT_STATUS="0"';
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
