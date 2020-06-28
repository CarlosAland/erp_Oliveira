<?php


// -------------------------CONEXAO COM O BANCO DE DADOS ----------------------------------

class Conect
{
  private static $instance;
  public static function getConn()
  {
    try {
      //verifica se existe a conexão caso não tenha cria uma
      if (!isset(self::$instance)) {
        self::$instance = new \PDO(
          'mysql:host=localhost;
        port=3308;
        dbname=erp',
          'root',
          '',
          [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
          ]
        );
        return self::$instance;
      } else {
        return self::$instance;
      }
    } catch (PDOException $e) {
      echo " Erro com banco de dados." . $e->getMessage();
    } catch (Exception $e) {
      echo "Erro genérico." . $e->getMessage();
    }
  }
}
