<?php
class Config
{
    private $connexion;

    public function _connectToDB()
    {
        try {
            $this->connexion = new PDO("mysql:host=localhost;dbname=tasti", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function getConnexion()
    {
        $this->_connectToDB();
        return $this->connexion;
    }

}

?>