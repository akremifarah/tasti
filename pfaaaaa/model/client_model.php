<?php
 class user_model {


    private $cin ;
    private  $nom;
    private $prenom;
    private $mdp;
    private $tlph;


    public function __construct($cin, $nom, $prenom,$mdp,$tlph)
    {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom= $prenom;
        $this->mdp= $mdp;
        $this->tlph= $tlph;
}
public function getcin()
    {
        return $this->cin;
    }

    public function setcin($cin)
    {
        $this->cin = $cin;
    }
    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;
    }
    public function getprenom()
    {
        return $this->prenom;
    }

    public function setprenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getmdp()
    {
        return $this->mdp;
    }

    public function setmdp($mdp)
    {
        $this->mdp = $mdp;
    }
    public function gettlph()
    {
        return $this->tlph;
    }

    public function settlph($tlph)
    {
        $this->tlph = $tlph;
    }


}
?>