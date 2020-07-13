<?php

class Lt
{
    private $id;
    private $nome;
    private $local;
    private $sigla;
    private $regiao; // recebe o id da regiao que pertence
    private $status; // define o status ativo ou inativo

    public function __construct($nome, $local, $sigla, $regiao, $status)
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->sigla = $sigla;
        $this->regiao = $regiao;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getLocal()
    {
        return $this->local;
    }
    public function setLocal($local)
    {
        $this->local = $local;
    }


    public function getSigla()
    {
        return $this->sigla;
    }
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }


    public function getRegiao()
    {
        return $this->regiao;
    }
    public function setRegiao($regiao)
    {
        $this->regiao = $regiao;
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
