<?php

class Producao
{
    private $item;
    private $data;
    private $lt;
    private $vao;
    private $comp;
    private $larg;
    private $justivicativa;
    private $fotoantes;
    private $fotodepois;
    private $equipe;
    private $vlrservico;

    public function __construct($item, $data, $lt, $vao, $comp, $larg, $fotoantes, $fotodepois, $equipe)
    {
        $this->item = $item;
        $this->data = $data;
        $this->lt = $lt;
        $this->vao = $vao;
        $this->comp = $comp;
        $this->larg = $larg;
        $this->fotoantes = $fotoantes;
        $this->fotodepois = $fotodepois;
        $this->equipe = $equipe;
    }

    public function getItem()
    {
        return $this->item;
    }
    public function setItem($item)
    {
        $this->item = $item;
    }


    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }


    public function getLt()
    {
        return $this->lt;
    }
    public function setLt($lt)
    {
        $this->lt = $lt;
    }


    public function getVao()
    {
        return $this->vao;
    }
    public function setVao($vao)
    {
        $this->vao = $vao;
    }


    public function getComp()
    {
        return $this->comp;
    }
    public function setComp($comp)
    {
        $this->comp = $comp;
    }


    public function getLargura()
    {
        return $this->larg;
    }
    public function setLargura($larg)
    {
        $this->larg = $larg;
    }


    public function getJustivicativa()
    {
        return $this->justivicativa;
    }
    public function setJustivicativa($justivicativa)
    {
        $this->justivicativa = $justivicativa;
    }


    public function getFotoantes()
    {
        return $this->fotoantes;
    }
    public function setFotoantes($fotoantes)
    {
        $this->fotoantes = $fotoantes;
    }

    public function getFotodepois()
    {
        return $this->fotodepois;
    }
    public function setFotodepois($fotodepois)
    {
        $this->fotodepois = $fotodepois;
    }

    public function getEquipe()
    {
        return $this->equipe;
    }
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }


    public function getVlrservico()
    {
       return $this->vlrservico;
    }
    public function setVlrservico($vlrservico)
    {
        $this->vlrservico = $vlrservico;
    }
}
