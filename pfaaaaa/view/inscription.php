<?php
ob_start();
include_once "../controller/user_controller.php";
$userController = new UserController ();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>TASTI Inscription</title>
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
		<!-- Signin form -->
		<h1>Créez Un Compte</h1>
		<form  class="signup-form" action="#" method="post" onsubmit="return verif()">
        <fieldset>
            <legend>Créez un compte</legend>
            <div class="form-group">
				<label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
			<div class="form-group">               
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>                
            </div>
            <div class="form-group">
                <label for="cin">CIN :</label>
                <input type="text" id="cin" name="cin" required>
            </div>
           
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="mdp">Confirmez le mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div> 
            <div class="form-group">
                <label for="tlph">numero de telephone</label>
                <input type="text" id="tlph" name="tlph" required>
            </div>            
            <div class="contact_form">
                <input type="submit" value="Créer un compte">
            </div>
            
            <div class="contact_form">
                <input type="reset" value="Annuler">
            </div>
        </fieldset>
    </form>
    <?php
    if (isset($_POST["cin"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mdp"]) && isset($_POST["tlph"])) {
   
        if (!empty($_POST["cin"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && isset($_POST["mdp"]) && isset($_POST["tlph"])) {
            $connexion = new PDO("mysql:host=localhost;dbname=tasti", "root", "");    
            $cin = htmlspecialchars($_POST["cin"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $mdp = md5($_POST["mdp"]);
            $tlph = htmlspecialchars($_POST["tlph"]);
        $user = $userController -> createUser($cin, $nom, $prenom,$mdp,$tlph);

        $userController -> addUser ($user);
        
    }
}
    
        
    ?>
    

     

</body>
</html>
