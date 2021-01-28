<?php if (isset($_POST['modifier'])) {
    header('location:admin_connexion.php');
} if (isset($_POST['supprimer'])) {
    header('location:admin_connexion.php');
}
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex_Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
</head>

<body>
<nav class="navbar is-dark " role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item ">
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu ">
      <div class="navbar-start">
        <a class="navbar-item">
          Home
        </a>

        <a class="navbar-item">
          Documentation
        </a>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-danger" href="accueil.php">
            <strong>Accueil</strong>
          </a>
        </div>
      </div>
    </div>
  </nav>
    <div class="columns">
        <div class="column">
            <form action="#" method="post">
                <input type="text" class="input is-primary" name="nom" placeholder="Nom">
                <input type="text" class="input is-primary" name="element" placeholder="Elément">
                <input type="text" class="input is-primary" name="story" placeholder="Histoire">
                <input type="text" class="input is-primary" name="dates" placeholder="Date de sortie">
                <input type="text" class="input is-primary" name="url" placeholder="Image du pokemon">
                <button type="submit" class="button is-primary">Envoyer dans le pc</button>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=CRUD;charset=utf8', 'Root', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $reponse = $bdd->query('SELECT * FROM user');
                if (isset($_POST['nom'])) {
                    $requete = 'INSERT INTO user VALUES(NULL, "' . $_POST['nom'] . '", "' . $_POST['element'] . '", "' . $_POST['story'] . '", "' . $_POST['dates'] . '", "' . $_POST['url'] . '")';
                    $resultat = $bdd->query($requete);
                }
                ?>
            </form>
        </div>
  

        <div class="column is-7">
            <?php $bdd = new PDO('mysql:host=127.0.0.1;dbname=CRUD;charset=utf8', 'Root', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM user');
            while ($donnees = $reponse->fetch()) {
                echo '<form method="post">';
                echo '<input type="hidden" name="id" value="' . $donnees['id'] . '">';
                echo '<input type="text" value="' . $donnees['nom'] . '" class="input is-primary" name="new_nom" placeholder="Nouveau nom">';
                echo '<br>';
                echo '<input type="text" value="' . $donnees['element'] . '" class="input is-primary" name="new_element" placeholder="Nouveau element">';
                echo '<br>';
                echo '<input type="text" value="' . $donnees['story'] . '" class="input is-primary" name="new_story" placeholder="Nouvelle histoire">';
                echo  '<br>';
                echo '<input type="text" value="' . $donnees['dates'] . '" class="input is-primary" name="new_dates" placeholder="Nouvelle date">';
                echo  '<br>';
                echo '<input type="text" value="' . $donnees['url'] . '" class="input is-primary" name="new_url" placeholder="Nouvelle image">';
                echo  '<br>';
                echo "      <div class=\"media-left\">\n";
                echo "        <figure class=\"image is-48x48\">\n";
                echo '<img src="' . $donnees['url'] . '"> <br>';
                echo "        </figure>\n";
                echo "      </div>\n";
                echo  '<br>';
                echo '<button class="button is-success" type="submit" name="modifier">Modifier</button> ';
                echo '<button class="button is-danger" type="submit" name="supprimer"">Relacher</button> ' . '<br/>';
                echo '</form>';
                echo  '<br>';


                if (isset($_POST['modifier'])) {
                    $requete = 'UPDATE user SET 
                    nom="' . $_POST['new_nom'] .'",
                    element="' . $_POST['new_element'] .'",
                    story="' . $_POST['new_story'] .'",
                    dates="' . $_POST['new_dates'] .'",
                    url="' . $_POST['new_url'] .'"
                    WHERE id="' . $_POST['id'] .'"';
                    $resultat = $bdd->query($requete);
                }
                if (isset($_POST['supprimer'])) {
                    $requete = 'DELETE FROM user WHERE id="' . $_POST['id'] . '"';
                    $resultat = $bdd->query($requete);
                }
            }
            ?>

        </div>
    



    </div>


</body>

</html>