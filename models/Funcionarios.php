<?php
define("DATE_BR", "d-m-Y");
date_default_timezone_set('America/Sao_Paulo');

class Funcionario
{
    private $id;
    private $cod;
    private $nome;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $tel;
    private $cel;
    private $rg;
    private $cpf;
    private $datanasc;
    private $dataadmissao;
    private $salario;
    private $funcao;    // Define a função do funcionario 
    private $datademissao;
    private $motivodemissao;
    private $obs;
    private $banco;
    private $agencia;
    private $conta;
    private $tipoconta;
    private $equipe;
    private $dataNow;
    private $status;

    public function __construct($cod, $nome, $endereco, $bairro, $cidade, $estado, $cep, $tel, $cel, $rg, $cpf, $datanasc, $dataadmissao, $salario, $funcao, $banco, $agencia, $conta, $tipoconta, $equipe)
    {
        $this->cod = $cod;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->tel = $tel;
        $this->cel = $cel;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->datanasc = $datanasc;
        $this->dataadmissao = $dataadmissao;
        $this->salario = number_format($salario, '2', '.', ',');;
        $this->funcao = $funcao;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->tipoconta = $tipoconta;
        $this->equipe = $equipe;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCod()
    {
        return $this->cod;
    }
    public function setCod($valor)
    {
        $this->cod = $valor;
    }


    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($valor)
    {
        $this->nome = $valor;
    }


    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($valor)
    {
        $this->endereco = $valor;
    }


    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($valor)
    {
        $this->bairro = $valor;
    }


    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($valor)
    {
        $this->cidade = $valor;
    }


    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($valor)
    {
        $this->estado = $valor;
    }


    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($valor)
    {
        $this->cep = $valor;
    }


    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($valor)
    {
        $this->tel = $valor;
    }


    public function getCel()
    {
        return $this->cel;
    }
    public function setCel($valor)
    {
        $this->cel = $valor;
    }


    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($valor)
    {
        $this->rg = $valor;
    }


    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($valor)
    {
        $this->cpf = $valor;
    }


    public function getDataNasc()
    {
        return $this->datanasc;
    }
    public function setDataNasc($valor)
    {
        $this->datanasc = $valor;
    }


    public function getDataAdmissao()
    {
        return $this->dataadmissao;
    }
    public function setDataAdmissao($valor)
    {
        $this->dataadmissao = $valor;
    }


    public function getSalario()
    {
        return $this->salario;
    }
    public function setSalario($valor)
    {
        $this->salario = $valor;
    }


    public function getFuncao()
    {
        return $this->funcao;
    }
    public function setFuncao($valor)
    {
        $this->funcao = $valor;
    }


    public function getDataDemissao()
    {
        return $this->datademissao;
    }
    public function setDataDemissao($valor)
    {
        $this->datademissao = $valor;
    }


    public function getMotivoDemissao()
    {
        return $this->motivodemissao;
    }
    public function setMotivoDemissao($valor)
    {
        $this->motivodemissao = $valor;
    }


    public function getObs()
    {
        return $this->obs;
    }
    public function setObs($valor)
    {
        $this->obs = $valor;
    }


    public function getBanco()
    {
        return $this->banco;
    }
    public function setBanco($valor)
    {
        $this->banco = $valor;
    }


    public function getAgencia()
    {
        return $this->agencia;
    }
    public function setAgencia($valor)
    {
        $this->agencia = $valor;
    }


    public function getConta()
    {
        return $this->conta;
    }
    public function setConta($valor)
    {
        $this->conta = $valor;
    }


    public function getTipoConta()
    {
        return $this->tipoconta;
    }
    public function setTipoConta($valor)
    {
        $this->tipoconta = $valor;
    }


    public function getEquipe()
    {
        return $this->equipe;
    }
    public function setEquipe($valor)
    {
        $this->equipe = $valor;
    }


    public function getDate()
    {
        $this->dataNow = date("Y-m-d");
        return  $this->dataNow;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
