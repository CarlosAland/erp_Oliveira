<?php

class Equipe
{
    private $nome;
    private $responsavel;
    private $vlrservico;
    private $observacao;
    private $status;

    public function __construct($nome, $responsavel, $vlrservico, $observacao, $status)
    {
        $this->nome = $nome;
        $this->responsavel = $responsavel;
        $this->vlrservico = number_format($vlrservico, '2', '.', ',');
        $this->observacao = $observacao;
        $this->status = $status;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getResponsalve()
    {
        return $this->responsavel;
    }
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }


    public function getVlrservico()
    {
        return $this->vlrservico;
    }
    public function setVlservico($responsavel)
    {
        $this->responsavel = $responsavel;
    }


    public function getObservacao()
    {
        return $this->observacao;
    }
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
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
