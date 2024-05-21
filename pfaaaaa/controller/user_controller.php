<meta charset="UTF-8">
<?php

require_once '../model/client_model.php';
require_once '../config/config.php';
class UserController
{
    private $connexion;

    public function __construct()
    {
        $conn = new Config();
        $this->connexion = $conn->getConnexion();
    }

    public function createUser($cin, $nom, $prenom,$mdp,$tlph)
    {
        return new user_model($cin, $nom, $prenom,$mdp,$tlph);
    }
    public function getUsers()
    {
        try {
            $req = "SELECT * FROM client";
            $res = $this->connexion->prepare($req);
            $res->execute();

            
            $users = $res->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            
            echo "Erreur lors de la récupération des utilisateurs: " . $e->getMessage();
            return [];
        }
    }
    public function getUserById($id)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                $userModel = new UserModel($user['cin'], $user['nom'], $user['prenom'], $user['mdp'], $user['tlph']);
                return $userModel;
            }
        }
        echo "<p class='error'>Aucun utilisateur trouvé avec l'ID " . $id . "</p>";
    }
    public function addUser($user)
    {
        try {
            
            $req = "INSERT INTO `client` (`cin`, `nom`, `prenom`, `mdp`, `tlph`) 
                VALUES (:cin, :nom, :prenom, :mdp, :tlph)";
            $res = $this->connexion->prepare($req);

           
            $res->bindValue(':cin', $user->getcin());
            $res->bindValue(':nom', $user->getnom());
            $res->bindValue(':prenom', $user->getprenom());
            $res->bindValue(':mdp', $user->getmdp());
            $res->bindValue(':tlph', $user->gettlph());

            
            if ($res->execute()) {
                echo "<script>alert('Insertion des données réussie')</script>";
                return true;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données " . $e->getMessage();
            return false;
        }
    }
    public function updateUser($cin, $nom, $prenom,$mdp,$tlph)
    {
    }
    public function deleteUser($id)
    {
        $req = "DELETE FROM client WHERE cin = ?";
        $res = $this->connexion->prepare($req);
        $res->execute($id);
    }
    
    

    public function logIn($cin, $mdp)
    {
        $sql = "SELECT * FROM client WHERE cin = :cin AND mdp = :mdp limit 1";
        $res = $this->connexion->prepare($sql);
        $res->bindValue(':cin', $cin);
        $res->bindValue(':mdp', $mdp);
        $res->execute();
        if ($res->rowCount() > 0) {
            echo "Le nom d'utilisateur existe dans la base de données.";
            session_start();
            $row = $res->fetch(PDO::FETCH_ASSOC);
            $_SESSION['cin'] = $cin;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['loggedin'] = true;
            header("location:reservation.php");
            return true;
        } else {
            echo " mot de passe incorrect";
            return false;

        }

    }


    public function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location:../view/accueil.php");

    }

}
?>