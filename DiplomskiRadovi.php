<?php

include "iRadovi.php";
include 'MyPDO.php';
include 'DiplomskiRadoviDBHelper.php';

class DiplomskiRadovi implements iRadovi
{
    private $naziv_rada;
    private $tekst_rada;
    private $link_rada;
    private $oib_tvrtke;

    private $diplomskiPdo;

    public function __construct()
    {
        $this->diplomskiPdo = DiplomskiRadoviDBHelper::getInstance(MyPDO::getInstance());
    }

    public function create($naziv_rada, $tekst_rada, $link_rada, $oib_tvrtke)
    {
        $this->naziv_rada = $naziv_rada;
        $this->tekst_rada = $tekst_rada;
        $this->link_rada = $link_rada;
        $this->oib_tvrtke = $oib_tvrtke;
    }

    public function save()
    {
        $this->diplomskiPdo->insert($this->naziv_rada, $this->tekst_rada, $this->link_rada, $this->oib_tvrtke);
    }

    public function read()
    {
        return json_encode($this->diplomskiPdo->findAll());
    }

    public function finish() {
        $this->diplomskiPdo->destroy();
    }

    public function getnaziv_rada()
    {
        return $this->naziv_rada;
    }

    public function setnaziv_rada($naziv_rada)
    {
        $this->naziv_rada = $naziv_rada;
    }

    public function gettekst_rada()
    {
        return $this->tekst_rada;
    }

    public function settekst_rada($tekst_rada)
    {
        $this->tekst_rada = $tekst_rada;
    }

    public function getlink_rada()
    {
        return $this->link_rada;
    }

    public function setlink_rada($link_rada)
    {
        $this->link_rada = $link_rada;
    }

    public function getoib_tvrtke()
    {
        return $this->oib_tvrtke;
    }

    public function setoib_tvrtke($oib_tvrtke)
    {
        $this->oib_tvrtke = $oib_tvrtke;
    }
}