<?php

require_once __DIR__ . "/pdo_conexao.php";

class FuncionarioDAO
{
  public function create(Funcionario $funcionario)
  {

    try {
      $sql = 'INSERT INTO tfuncionario
      (TFUNC_CODIGO, TFUNC_NOME ,TFUNC_END, TFUNC_BAIRRO, TFUNC_CEP,
      TFUNC_CIDADE, TFUNC_EST, TFUNC_RG, TFUNC_CPF, TFUNC_TEL, TFUNC_CEL, 
      TFUNC_DT_NASC, TFUNC_DT_ADMIS, TFUNC_DT_DEMIS, TFUNC_MOTIVO_DEMIS, 
      TFUNC_SALARIO, TFUNC_OBS,TFUNC_STATUS,TFUNC_FUNCAO_ID_FK, TFUNC_DATA_CAD, 
      TFUNC_EQUIPE_ID_FK, TFUNC_BANCO, TFUNC_AGENCIA, TFUNC_CONTA, TFUNC_TIPOCONTA) 
      VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $funcionario->getCod());
      $stmt->bindValue(2, $funcionario->getNome());
      $stmt->bindValue(3, $funcionario->getEndereco());
      $stmt->bindValue(4, $funcionario->getBairro());
      $stmt->bindValue(5, $funcionario->getCep());
      $stmt->bindValue(6, $funcionario->getCidade());
      $stmt->bindValue(7, $funcionario->getEstado());
      $stmt->bindValue(8, $funcionario->getRg());
      $stmt->bindValue(9, $funcionario->getCpf());
      $stmt->bindValue(10, $funcionario->getTel());
      $stmt->bindValue(11, $funcionario->getCel());
      $stmt->bindValue(12, $funcionario->getDataNasc());
      $stmt->bindValue(13, $funcionario->getDataAdmissao());
      $stmt->bindValue(14, $funcionario->getDataDemissao());
      $stmt->bindValue(15, $funcionario->getMotivoDemissao());
      $stmt->bindValue(16, $funcionario->getSalario());
      $stmt->bindValue(17, $funcionario->getObs());
      $stmt->bindValue(18, true);
      $stmt->bindValue(19, $funcionario->getFuncao());
      $stmt->bindValue(20, $funcionario->getDate());
      $stmt->bindValue(21, $funcionario->getEquipe());
      $stmt->bindValue(22, $funcionario->getBanco());
      $stmt->bindValue(23, $funcionario->getAgencia());
      $stmt->bindValue(24, $funcionario->getConta());
      $stmt->bindValue(25, $funcionario->getTipoConta());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function read()
  {
    try {

      $sql = 'SELECT * FROM tfuncionario';
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

      $sql = "SELECT * FROM tfuncionario WHERE TFUNC_ID='$id'";
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

  public function upDate(Funcionario $funcionario, $id)
  {
    try {

      $sql = "UPDATE tfuncionario SET TFUNC_CODIGO = ?, TFUNC_NOME = ? ,TFUNC_END = ?,
      TFUNC_BAIRRO = ?, TFUNC_CEP = ?, TFUNC_CIDADE = ?, TFUNC_EST = ?, TFUNC_RG = ?,
      TFUNC_CPF = ?, TFUNC_TEL = ?, TFUNC_CEL = ?, TFUNC_DT_NASC = ?, TFUNC_DT_ADMIS = ?,
      TFUNC_DT_DEMIS = ?, TFUNC_MOTIVO_DEMIS = ?, TFUNC_SALARIO = ?, TFUNC_STATUS = ?,
      TFUNC_FUNCAO_ID_FK = ?, TFUNC_DATA_CAD = ?, TFUNC_EQUIPE_ID_FK = ?, TFUNC_BANCO = ?,
      TFUNC_AGENCIA = ?, TFUNC_CONTA = ?, TFUNC_TIPOCONTA = ?  WHERE  TFUNC_ID='$id'";
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $funcionario->getCod());
      $stmt->bindValue(2, $funcionario->getNome());
      $stmt->bindValue(3, $funcionario->getEndereco());
      $stmt->bindValue(4, $funcionario->getBairro());
      $stmt->bindValue(5, $funcionario->getCep());
      $stmt->bindValue(6, $funcionario->getCidade());
      $stmt->bindValue(7, $funcionario->getEstado());
      $stmt->bindValue(8, $funcionario->getRg());
      $stmt->bindValue(9, $funcionario->getCpf());
      $stmt->bindValue(10, $funcionario->getTel());
      $stmt->bindValue(11, $funcionario->getCel());
      $stmt->bindValue(12, $funcionario->getDataNasc());
      $stmt->bindValue(13, $funcionario->getDataAdmissao());
      $stmt->bindValue(14, $funcionario->getDataDemissao());
      $stmt->bindValue(15, $funcionario->getMotivoDemissao());
      $stmt->bindValue(16, $funcionario->getSalario());
      $stmt->bindValue(17, true);
      $stmt->bindValue(18, $funcionario->getFuncao());
      $stmt->bindValue(19, $funcionario->getDate());
      $stmt->bindValue(20, $funcionario->getEquipe());
      $stmt->bindValue(21, $funcionario->getBanco());
      $stmt->bindValue(22, $funcionario->getAgencia());
      $stmt->bindValue(23, $funcionario->getConta());
      $stmt->bindValue(24, $funcionario->getTipoConta());
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function delete($id)
  {
    try {

      $sql = 'DELETE FROM tfuncionario WHERE TFUNC_ID=?';
      $stmt = Conect::getConn()->prepare($sql);

      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}
