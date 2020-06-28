<?php

require_once __DIR__ . "/pdo_conexao.php";

class FuncaoDAO
{
  public function create(Funcao $funcao)
  {

    try {
      $sql = 'INSERT INTO tfuncao(TFUNCAO_NOME) VALUE (?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $funcao->getNome());

      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function read()
  {
    try {

      $sql = 'SELECT * FROM tfuncao';
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

  public function upDate(Funcao $funcao)
  {
    try {

      $sql = 'UPDATE tfuncao SET TFUNCAO_NOME=? WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $funcao->getNome());
      $stmt->bindValue(2, $funcao->getCod());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tfuncao WHERE id=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
