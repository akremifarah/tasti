<?php
include_once "../controller/reservation_controller.php";
$reservationController = new reservationController ();
?>
<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TASTI Reservation</title>
      <link rel="icon" href="img_accueil/logo.png" type="img_accueil/png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="script.js"></script>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        /* Styles du formulaire */
     form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form select,
      form input[type="date"],
      form input[type="submit"] {
            width: 40%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
			margin-right : 20px;
        }
		form input[type="reset"] {
            width: 40%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

      input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

       input[type="submit"]:hover {
            background-color: #555;
        }
		
		 input[type="reset"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

       input[type="reset"]:hover {
            background-color: #555;
        }
    </style>
	
</head>
<body>
  <header id="header">
      <img id="logo" src="img_accueil\logo.png" alt="">
      <nav id="top-nav">
      <a class="hl" href="evaluation.php">Evaluer</a>
      <a class="hl" href="inscription.php">S'inscrire</a>
      <a class="hl" href="connexion.php">Se connecter</a>
		<a class="hl" href="accueil.php" class="Accueil">Accueil</a>

        </nav>
  </header>
<form name="form1" method="post" action="">
 <fieldset><legend>Enregistrement d'un testeur :</legend>
  <p> 
    <label for="cin">CIN :</label>
    <input type="text" id="cin" name="cin">

    
    <br><br>
    <label for="idvoiture">Modele de voiture : </label>
        <select name="idvoiture" id="idvoiture">
                <option value="wallys_iris">Wallys Iris</option>
                <option value="wallys_wolf">Wallys Wolf</option>
                <option value="wallys_216">Wallys 216</option>
                <option value="wallys_719">Wallys 719</option>
        </select>
        <br><br>
    <label for="date_sortie">Date d'entrée :</label>
    <input type="date" id="date_sortie" name="date_sortie" value="date_sortie">
    <br><br>
    <label for="date_retour">Date de sortie :</label>
    <input type="date" id="date_retour" name="date_retour" value="date_retour">
    <br><br>
    <input type="submit" value="Réserver">
	<input type="reset" value="Annuler">

</p>
 </fieldset>
</form>
<?php
    if ( isset($_POST["cin"]) && isset($_POST["date_sortie"]) && isset($_POST["date_retour"])) {
        
        $cin =$_POST["cin"];
        $date_sortie=$_POST["date_sortie"];
        $date_retour= $_POST["date_retour"];
       
        $reservation = $reservationController -> createReservation($cin, $date_sortie,$date_retour);

        $reservationController -> addReservation ($reservation);
        try {
          
          echo "Data inserted successfully.";
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
    }    
    ?>
<footer>
    <p>&copy; 2024 TASTI Tous droits réservés.</p>
</footer></body>
</html>
