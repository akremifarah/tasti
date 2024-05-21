<meta charset="UTF-8">
<?php

require_once '../model/reservation_model.php';
require_once '../config/config.php';
class reservationController
{
    private $connexion;

    public function __construct()
    {
        $conn = new Config();
        $this->connexion = $conn->getConnexion();
    }
    public function createReservation($cin,$date_sortie,$date_retour)
    {
        return new reservation($cin,$date_sortie,$date_retour);
    }

    public function getReservation()
    {
        try {
            
            $req = "SELECT * FROM reservation";
            $res = $this->connexion->prepare($req);
            $res->execute();

           
            $users = $res->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des utilisateurs: " . $e->getMessage();
            return [];
        }
    }
    public function getReservationById($id)
    {
        $users = $this->getReservation();
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                $userModel = new UserModel($user['cin'], $user['date_sortie'], $user['date_retour']);
                return $userModel;
            }
        }
        echo "<p class='error'>Aucun utilisateur trouvé avec l'ID " . $id . "</p>";
    }

    public function addReservation($reservation)
    {
        try {
            
            $req = "INSERT INTO `reservation` (`cin`, `date_sortie`, `date_retour`) 
                VALUES (:cin,:date_sortie, :date_retour)";
            $res = $this->connexion->prepare($req);

            
            $res->bindValue(':cin', $reservation->getcin());
            $res->bindValue(':date_sortie', $reservation->getdate_sortie());
            $res->bindValue(':date_retour', $reservation->getdate_retour());

           
            if ($res->execute()) {
                echo "<script>alert('Insertion des données réussie')</script>";
                return true;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données " . $e->getMessage();
            return false;
        }
    }
    public function updateReservation($cin,$idvoiture,$date_sortie,$date_retour)
    {
        
    }
    public function deleteReservation($id)
    {
        $req = "DELETE FROM reservation WHERE idvoiture = ?";
        $res = $this->connexion->prepare($req);
        $res->execute($id);
    }
    
}
?>