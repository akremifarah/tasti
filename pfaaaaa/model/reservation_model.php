<?php
 class reservation
 {


private $cin ;
private $date_sortie;
private $date_retour;



public function __construct($cin,$date_sortie,$date_retour ){
        $this->cin = $cin;
        $this->date_sortie= $date_sortie;
        $this->date_retour= $date_retour;
    

}
public function getcin()
    {
        return $this->cin;
    }

 public function setcin($cin)
    {
        $this->cin = $cin;
}

public function getdate_sortie() {
    return $this->date_sortie;
}

public function setdate_sortie() {
    $this->date_sortir = $date_sortie;
}    

public function getdate_retour() {
    return $this->date_retour;
}

public function setdate_retour() {
    $this->date_retour = $date_retour;
} 
}

?>