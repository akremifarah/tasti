<meta charset="UTF-8">
<?php

require_once '../model/evaluation_model.php';
require_once '../config/config.php';
class evaluationController
{
    private $connexion;

    public function __construct()
    {
        $conn = new Config();
        $this->connexion = $conn->getConnexion();
    }

    public function createevaluation($cin, $idvoiture, $securite, $conduite,$confort)
    {
        return new evaluation_model ($cin, $idvoiture, $securite, $conduite,$confort);
    }
    public function getevaluation()
    {
        try {
            
            $req = "SELECT * FROM evaluation";
            $res = $this->connexion->prepare($req);
            $res->execute();

            
            $users = $res->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des utilisateurs: " . $e->getMessage();
            return [];
        }
    }
    
    public function addevaluation($pay)
    {
        try {
            
            $req = "INSERT INTO `evaluation` (`cin`, `idvoiture`, `securite`, `conduite`, `confort`) 
                VALUES (:cin, :idvoiture, :securite, :conduite, :confort)";
            $res = $this->connexion->prepare($req);

            
            $res->bindValue(':cin',$pay->getcin());
            $res->bindValue(':idvoiture',$pay->getidvoiture());
            $res->bindValue(':securite',$pay->getsecurite());
            $res->bindValue(':conduite', $pay->getconduite());
            $res->bindValue(':confort', $pay->getconfort());

            if ($res->execute()) {
                echo "<script>alert('Insertion des données réussie')</script>";
                return true;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données " . $e->getMessage();
            return false;
        }
    }
    public function updateevaluation($cin, $idvoiture, $securite, $conduite,$confort)
    {
        
    }
    public function deletepay($id)
    {
        $req = "DELETE FROM evaluation WHERE idvoiture = ?";
        $res = $this->connexion->prepare($req);
        $res->execute($id);
    }
    
}
?>