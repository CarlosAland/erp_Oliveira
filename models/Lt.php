<?php

class Lt
{
    private $id;
    private $nome;
    private $local;
    private $sigla;
    private $regiao; // recebe o id da regiao que pertence

    public function __construct($nome, $sigla, $regiao)
    {
        $this->nome = $nome;
        $this->sigla = $sigla;
        $this->regiao = $regiao;
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
}
