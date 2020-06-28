<?php
class Funcao
{
    private $cod; // auto incremento
    private $nome;

    public function getCod()
    {
        return $this->cod;
    }
    

    public function getNome()
    {
        return $this->nome;
    }
    public function set($valor)
    {
        $this->nome = $valor;
    }
}
