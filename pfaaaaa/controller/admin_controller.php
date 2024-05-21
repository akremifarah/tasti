<meta charset="UTF-8">
<?php

require_once '../model/admin_model.php';
require_once '../config/config.php';
class adminController
{
    private $connexion;

    public function __construct()
    {
        $conn = new Config();
        $this->connexion = $conn->getConnexion();
    }

    public function createUser($cin,$mdp)
    {
        return new admin_model($cin,$mdp);
    }
    public function getUsers()
    {
        try {
           
            $req = "SELECT * FROM admin";
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
                $userModel = new adminModel($user['idadmin'],$user['cin'], $user['nom'], $user['prenom'], $user['mdp'], $user['tlph']);
                return $userModel;
            }
        }
        echo "<p class='error'>Aucun utilisateur trouvé avec l'ID " . $id . "</p>";
    }
    public function addUser($cin,$mdp)
    {
        try {
            
            $req = "INSERT INTO `admin` (`cin`, `mdp`) 
                VALUES (:cin,:mdp)";
            $res = $this->connexion->prepare($req);

            
           $res->bindValue(':cin', $user->getcin());
            
            $res->bindValue(':mdp', $user->getmdp());
            

            
            if ($res->execute()) {
                echo "<script>alert('Insertion des données réussie')</script>";
                return true;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données " . $e->getMessage();
            return false;
        }
    }
    public function updateUser($cin,$mdp)
    {
    }
    public function deleteUser($cin)
    {
        $req = "DELETE FROM admin WHERE cin = ?";
        $res = $this->connexion->prepare($req);
        $res->execute($cin);
    }
    
    

    public function logIn($cin, $mdp)
    {
        $sql = "SELECT * FROM admin WHERE cin = :cin AND mdp = :mdp limit 1";
        $res = $this->connexion->prepare($sql);
        $res->bindValue(':cin', $cin);
        $res->bindValue(':mdp', $mdp);
        $res->execute();
        if ($res->rowCount() > 0) {
            echo "Le nom d'utilisateur existe dans la base de données.";
            session_start();
            $row = $res->fetch(PDO::FETCH_ASSOC);
            $_SESSION['idadmin'] = $idadmin;
            $_SESSION['cin'] = $cin;
            
            $_SESSION['mdp'] = $mdp;
            
            $_SESSION['loggedin'] = true;
            header("location:page_administrateur.php");
            return true;
        } else {
            echo "Cin ou mot de passe incorrect";
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