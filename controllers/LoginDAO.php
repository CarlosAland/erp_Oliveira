<?php

require_once __DIR__ . "/pdo_conexao.php";

class LoginDAO
{
  function loginUsuario($login, $senha)
  {

    try {
      $sql = "SELECT * FROM tlogin WHERE tlogin_nome = '$login' AND tlogin_pass = '$senha'";
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
