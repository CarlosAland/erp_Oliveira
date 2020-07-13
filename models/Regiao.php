<?php
class Regiao{
    private $cod; // auto incremento
    private $nome;
    private $status;

    public function __construct($nome,$status)
    {
        $this->nome = $nome;
        $this->status = $status;
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
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }



}