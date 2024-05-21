<?php
 class admin_model {

    
    private $cin ;
    private $mdp;
    


    public function __construct($cin,$mdp)
    {
        
        $this->cin = $cin;
        $this->mdp= $mdp;
       
    }

public function getcin()
    {
        return $this->cin;
    }

    public function setcin($cin)
    {
        $this->cin = $cin;
    }
   
    public function getmdp()
    {
        return $this->mdp;
    }

    public function setmdp($mdp)
    {
        $this->mdp = $mdp;
    }
    


}
?>