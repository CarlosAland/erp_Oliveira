<?php
class Regiao{
    private $cod; // auto incremento
    private $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function getCod()
    {
        return $this->cod;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
       $this->nome = $nome;
    }
    
}