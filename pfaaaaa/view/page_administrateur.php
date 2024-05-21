<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="page_administrateur.css">
  <link rel="stylesheet" href="adm.css">
  <link rel="stylesheet" href="x.css">
  <title>Admin Panel</title>
</head>
<body>
  <header>
    <h1>Bienvenue sur le panel d'administration!</h1>
  </header>
  <nav>
    <ul>
      <li><a href="page_administrateur.php">Administrateur</a></li>
      
      
    </ul>
  </nav>
  <main>
    
    <section>
      <h2>Les derniers comptes crées des administrateurs !</h2>
      <?php
      try {
        $pdo = new PDO('mysql:host=localhost;dbname=tasti', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        
        echo 'Erreur : ' . $e->getMessage();
        die();
    }
      $strategies=$pdo->query('SELECT * FROM admin')->fetchall(PDO::FETCH_OBJ);
      ?>
      <table class="table-striped" border="1">
        <thead>
          <tr>
          <th>cin</th>
            <th>mdp</th>
           
         </tr>
       </thead>
       <tbody>
       <?php foreach ($strategies as $login_adm) : ?>
        <tr>
        <td><?= $login_adm->cin?></td>
       
          
          <td><?= $login_adm->mdp?></td>
         
       </tr>
       <?php endforeach ; ?>
       <?php
include '../config/configadm.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $cin = $_POST['cin'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO admin (cin, mdp) VALUES ('$cin', '$mdp')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nouveau administrateur ajouté avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['delete_user'])) {
        $cin = $_POST['cin'];
        
        $sql = "DELETE FROM admin WHERE cin='$cin'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Utilisateur supprimé avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
</head>
<body>
    

    <h2>Ajouter un administrateur</h2>
    <form method="POST" >
       
      <div class="coolinput">
    <label for="cin" class="text">CIN d'admin:</label>
    <input type="text" id="cin" name="cin" required class="input">
</div>
    
        <div class="coolinput">
    <label for="mdp" class="text">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required class="input">
</div>
        <br>
        <button class="cssbuttons-io-button" type="submit" name="add_user">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Ajouter l'administrateur</span>
</button>
    </form>

    <h2>Supprimer un administrateur</h2>
    <form method="POST">
    <div class="container">
<div class="search-container">

  <input class="input" type="text"id="cin" name="cin" required>
  <svg viewBox="0 0 24 24" class="search__icon">
    <g>
      <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
      </path>
    </g>
  </svg>
</div>
</div>
       

        <button class="cssbuttons-io-button" type="submit" name="delete_user">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Supprimer l'administrateur</span>
</button>
       
    </form>
       </tbody>
       </table>
    </section>
    
    <section>
      <h2>Les derniers comptes crées des clients</h2>
      <?php
      try {
        $pda = new PDO('mysql:host=localhost;dbname=tasti', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        
        echo 'Erreur : ' . $e->getMessage();
        die();
    }
      $strategie=$pda->query('SELECT * FROM client')->fetchall(PDO::FETCH_OBJ);
      ?>
      <table class="table-striped" border="1">
        <thead>
          <tr>
          <th>cin</th>
            <th>prenom</th>
            <th>mdp</th>
            <th>tlph</th>
         </tr>
       </thead>
       <tbody>
       <?php foreach ($strategie as $client) : ?>
        <tr>
          <td><?= $client->cin?></td>
          <td><?= $client->prenom?></td>
          <td><?= $client->mdp?></td>
          <td><?= $client->tlph?></td>
       </tr>
       <?php endforeach ; ?>
       <?php
include '../config/configadm.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $cin = $_POST['cin'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO client (cin, mdp) VALUES ('$cin', '$mdp')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel utilisateur ajouté avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['delete_user'])) {
        $nom = $_POST['nom'];
        
        $sql = "DELETE FROM client WHERE cin='$cin'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Utilisateur supprimé avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
</head>
<body>
    

    <h2>Ajouter un utilisateur</h2>
    <form method="POST" >
       
      <div class="coolinput">
    <label for="cin" class="text">CIN d'utilisateur:</label>
    <input type="text" id="cin" name="cin" required class="input">
</div>
    
        <div class="coolinput">
    <label for="mdp" class="text">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required class="input">
</div>
        <br>
        <button class="cssbuttons-io-button" type="submit" name="add_user">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Ajouter l'utilisateur</span>
</button>
    </form>

    <h2>Supprimer un utilisateur</h2>
    <form method="POST">
    <div class="container">
<div class="search-container">

  <input class="input" type="text"id="cin" name="cin" required>
  <svg viewBox="0 0 24 24" class="search__icon">
    <g>
      <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
      </path>
    </g>
  </svg>
</div>
</div>
       

        <button class="cssbuttons-io-button" type="submit" name="delete_user">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
  <span>Supprimer l'utilisateur</span>
</button>
       
    </form>
       </tbody>
       </table>
    </section>
  </main>
</body>
</html>
