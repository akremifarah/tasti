<?php
ob_start();
include_once "../controller/admin_controller.php";
$adminController = new adminController ();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Administration</title>
	<link rel="stylesheet" href="inscript_style.css">
	
</head>
<body>
  
	<div class="background-image">
    <!--nav barre-->
    <nav id="top-nav">
    <ul>
		<li><a href="accueil.php" class="Accueil">Accueil</a></li>
		<li><a href="connexion.php" class="Accueil">Se connecter</a></li>

    </ul>
    </nav>
	</div>


	<div class="container_connect">
    <div class="form-container">
		<!-- Login form -->
		<h1>Connexion</h1>
		<form  class="signup-form" action="#" method="post" onsubmit="return verif()">
        <fieldset>
            <legend>Information de l'administrateur</legend>
            
            <div class="form-group">
                <label for="cin">CIN :</label>
                <input type="cin" id="cin" name="cin" required>
            </div>
           
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>    
            <div class="contact-form">
					<input type="submit" value="Se connecter">
				</div>
            
            <div class="contact_form">
                <input type="reset" value="Annuler">
            </div>
        </fieldset>
    </form>
    <?php


          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['cin']) && isset($_POST['mdp'])) {
                $cin = $_POST['cin'];
                $mdp = $_POST['mdp'];
                
                $errors = array(); 
                if (empty($cin)) {
                    $errors[] = "Veuillez entrer un num cin.";
                }
                
                if (empty($mdp)) {
                    $errors[] = "Veuillez entrer un mot de passe.";
                }
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                } else {

                    $user = $adminController -> createUser($cin,$mdp);
                
                    $adminController -> logIn ($cin,$mdp);
    
    
                    header("location:page_administrateur.php");
                  }
                }
              }
                  ?>
   
    

     

</body>
</html>
