<?php

require_once __DIR__ . "/pdo_conexao.php";

class producaoDAO
{
  public function create(Producao $prod)
  {

    try {
      $sql = 'INSERT INTO titensprod(TTITENSPROD_DATA, TTITENSPROD_ITEM, TTITENSPROD_VAO,
      TTITENSPROD_COMP, TTITENSPROD_LARG, TTITENSPROD_JUST, TTITENSPROD_VLR_SERV, 
      TTITENSPROD_EQUIPE_ID_FK, TTITENSPROD_LT_FK, TTITENSPROD_IMG_ANTES, TTITENSPROD_IMG_DEPOIS)
      VALUE (?, ?, ?, ?,?,?,?,?,?,?,?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $prod->getData());
      $stmt->bindValue(2, $prod->getItem());
      $stmt->bindValue(3, $prod->getVao());
      $stmt->bindValue(4, $prod->getComp());
      $stmt->bindValue(5, $prod->getLargura());
      $stmt->bindValue(6, $prod->getJustivicativa());
      $stmt->bindValue(7, $prod->getVlrservico());
      $stmt->bindValue(8, $prod->getEquipe());
      $stmt->bindValue(9, $prod->getLt());
      $stmt->bindValue(10, $prod->getFotoantes());
      $stmt->bindValue(11, $prod->getFotodepois());

      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function read()
  {
    try {

      $sql = 'SELECT * FROM titensprod';
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

      $sql = "SELECT * FROM titensprod WHERE TTITENSPROD_ID_PK='$id'";
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

  public function upDate(Producao $prod, $id)
  {
    try {

      $sql = "UPDATE titensprod SET TTITENSPROD_DATA = ?, TTITENSPROD_ITEM = ?, 
      TTITENSPROD_VAO = ?, TTITENSPROD_COMP = ?, TTITENSPROD_LARG = ?, TTITENSPROD_JUST = ?,
      TTITENSPROD_VLR_SERV = ?, TTITENSPROD_EQUIPE_ID_FK = ?, TTITENSPROD_LT_FK = ?,
      TTITENSPROD_IMG_ANTES = ?, TTITENSPROD_IMG_DEPOIS = ? WHERE TTITENSPROD_ID_PK='$id'";
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $prod->getData());
      $stmt->bindValue(2, $prod->getItem());
      $stmt->bindValue(3, $prod->getVao());
      $stmt->bindValue(4, $prod->getComp());
      $stmt->bindValue(5, $prod->getLargura());
      $stmt->bindValue(6, $prod->getJustivicativa());
      $stmt->bindValue(7, $prod->getVlrservico());
      $stmt->bindValue(8, $prod->getEquipe());
      $stmt->bindValue(9, $prod->getLt());
      $stmt->bindValue(10, $prod->getFotoantes());
      $stmt->bindValue(11, $prod->getFotodepois());

      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM titensprod WHERE TTITENSPROD_ID_PK=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
