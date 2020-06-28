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

    public function __construct(
        $cod,
        $nome,
        $endereco,
        $bairro,
        $cidade,
        $estado,
        $cep,
        $tel,
        $cel,
        $rg,
        $cpf,
        $datanasc,
        $dataadmissao,
        $salario,
        $funcao,
        $obs,
        $banco,
        $agencia,
        $conta,
        $tipoconta
    ) {
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
        $this->salario = $salario;
        $this->funcao = $funcao;
        $this->obs = $obs;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->tipoconta = $tipoconta;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCod()
    {
        return $this->cod;
    }
    public function setCod($cod)
    {
        $this->cod = $cod;
    }


    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }


    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }


    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }


    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }


    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }


    public function getCel()
    {
        return $this->cel;
    }
    public function setCel($cel)
    {
        $this->cel = $cel;
    }


    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }


    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


    public function getDataNasc()
    {
        return $this->datanasc;
    }
    public function setDataNasc($datanasc)
    {
        $this->datanasc = $datanasc;
    }


    public function getDataAdmissao()
    {
        return $this->dataadmissao;
    }
    public function setDataAdmissao($dataadmissao)
    {
        $this->dataadmissao = $dataadmissao;
    }


    public function getSalario()
    {
        return $this->salario;
    }
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }


    public function getFuncao()
    {
        return $this->funcao;
    }
    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;
    }


    public function getDataDemissao()
    {
        return $this->datademissao;
    }
    public function setDataDemissao($datademissao)
    {
        $this->datademissao = $datademissao;
    }


    public function getMotivoDemissao()
    {
        return $this->motivodemissao;
    }
    public function setMotivoDemissao($motivodemissao)
    {
        $this->motivodemissao = $motivodemissao;
    }


    public function getObs()
    {
        return $this->obs;
    }
    public function setObs($obs)
    {
        $this->obs = $obs;
    }


    public function getBanco()
    {
        return $this->banco;
    }
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }


    public function getAgencia()
    {
        return $this->agencia;
    }
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }


    public function getConta()
    {
        return $this->conta;
    }
    public function setConta($conta)
    {
        $this->conta = $conta;
    }


    public function getTipoConta()
    {
        return $this->tipoconta;
    }
    public function setTipoConta($tipoconta)
    {
        $this->tipoconta = $tipoconta;
    }


    public function getEquipe()
    {
        return $this->equipe;
    }
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
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
