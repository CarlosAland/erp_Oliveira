<?php

require_once __DIR__ . "/pdo_conexao.php";

class LtDAO
{
  public function create(Lt $lt)
  {

    try {
      $sql = 'INSERT INTO tlt(TLT_NOME) VALUE (?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $equipe->getNome());

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

  public function upDate(Funcao $lt)
  {
    try {

      $sql = 'UPDATE tlt SET TLT_NOME=? WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $lt->getNome());
      $stmt->bindValue(2, $lt->getCod());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tlt WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
