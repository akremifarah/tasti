<?php 
class evaluation_model
{
    private $cin;
    private $idvoiture;
    private $securite;
    private $conduite;
    private $confort;
    public function __construct($cin, $idvoiture, $securite, $conduite ,$confort)
    {
        $this->cin = $cin;
        $this->idvoiture= $idvoiture;
        $this->securite = $securite;
        $this->conduite = $conduite;
        $this->confort = $confort;
}
public function getcin()
    {
        return $this->cin;
    }

    public function setcin($cin)
    {
        $this->cin = $cin;
    }
    public function getidvoiture()
    {
        return $this->idvoiture;
    }

    public function setidvoiture($idvoiture)
    {
        $this->idvoiture = $idvoiture;
    }
    public function getsecurite()
    {
        return $this->securite;
    }

    public function setsecurite($securite)
    {
        $this->securite = $securite;
    }
    public function getconduite()
    {
        return $this->conduite;
    }

    public function setconduite($conduite)
    {
        $this->conduite= $conduite;
    }
    public function getconfort()
    {
        return $this->confort;
    }

    public function setconfort($confort)
    {
        $this->confort = $confort;
    }


}
?>