<?php

require_once __DIR__ . "/pdo_conexao.php";

class EquipeDAO
{
  public function create(Equipe $equipe)
  {

    try {
      $sql = 'INSERT INTO tequipe(TEQUIPE_NOME) VALUE (?)';
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

      $sql = 'SELECT * FROM tequipe';
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

  public function upDate(Funcao $equipe)
  {
    try {

      $sql = 'UPDATE tequipe SET TEQUIPE_NOME=? WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $equipe->getNome());
      $stmt->bindValue(2, $equipe->getCod());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tequipe WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
