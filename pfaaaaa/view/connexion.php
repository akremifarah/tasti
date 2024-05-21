<?php
include_once "../controller/user_controller.php";
$userController = new UserController ();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>TASTI Connexion</title>
	<link rel="stylesheet" href="inscript_style.css">
	<script src="script.js"></script>
</head>
<body>
	  

	<div class="background-image">
	<!--nav barre-->
	<nav id="top-nav">
	<ul>
		<li><a href="accueil.php" class="Accueil">Accueil</a></li>
		<li><a href="inscription.php" class="Accueil">S'inscrire</a></li>    
	</ul>
	</nav>
	</div>


	<div class="container_connect">
	<div class="form-container">

		<h1> Se connecter </h1>
		<form action="#" method="post" class="cnx-form">
			<fieldset>
				<legend>Informations de connexion</legend>
				<div class="form-group">
					<label for="cin">CIN :</label>
					<input type="text" id="cin" name="cin" required >
				</div>
		
				<div class="form-group">
					<label for="mdp">Mot de passe :</label>
					<input type="password" id="mdp" name="mdp" required>
				</div>
				            
				
				<div class="contact-form">
					<input type="submit" value="Se connecter">
				</div>
			</fieldset>
		</form>
	</div>
	</div>
	<?php
                
                $error = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cin = $_POST['cin'];
                    $mdp = $_POST['mdp'];
                    if (empty($cin)) {
                        $error .= "Veuillez entrer votre cin.<br>";
                    } 
                    if (empty($mdp)) {
                        $error .= "Veuillez entrer votre mot de passe.<br>";
                    }
                
                    if (empty($error)) {
                        $cin = htmlspecialchars($cin);
                        $mdp= md5($mdp); 
                        $connexion = new mysqli("localhost", "root", "", "");
                
                        if ($connexion->connect_error) {
                            die("La connexion a échoué : " . $connexion->connect_error);
                        }
                    $userController ->  logIn($cin, $mdp);

					header("location:reservation.php");

                  }
                }
                  ?>

</body>
</html>
