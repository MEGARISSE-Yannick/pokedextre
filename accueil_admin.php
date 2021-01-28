<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pokedextre</title>
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
          <a class="button is-danger" href="admin_connexion.php">
            <strong>Modification</strong>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="columns is-gapless">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <?php
      $bdd = new PDO('mysql:host=localhost;dbname=CRUD;charset=utf8', 'Root', 'Simplon974', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $reponse = $bdd->query('SELECT * FROM user');
      while ($donnees = $reponse->fetch()) {
        echo "  <div class=\"card-image\">\n";
        echo "    <figure class=\"image is-4by3\">\n";
        echo '<img src="' . $donnees['url'] . '"> <br>';
        echo "    </figure>\n";
        echo "  </div>\n";
        echo "  <div class=\"card-content\">\n";
        echo "    <div class=\"media\">\n";
        echo "      <div class=\"media-left\">\n";
        echo "        <figure class=\"image is-48x48\">\n";
        echo '<img src="' . $donnees['url'] . '"> <br>';
        echo "        </figure>\n";
        echo "      </div>\n";
        echo "      <div class=\"media-content\">\n";
        echo '        <p class=\"title is-4\">' . $donnees['nom'] . ' </p>';
        echo '        <p class=\"subtitle is-6\">' . $donnees['element'] . '</p>';
        echo "      </div>\n";
        echo "    </div>\n";
        echo "\n";
        echo "    <div class=\"content\">\n";
        echo  $donnees['story'];
        echo "      <br>\n";
        echo $donnees['dates'] . '<br>';
        echo "  </div>\n";
        echo '<div class="card">';
        echo '<footer class="card-footer">';
        echo '<div class="buttons"><a href="#" class="card-footer-item is-primary">Save</a>';
        echo '<div class="buttons"><a href="#" class="card-footer-item is-success">Edit</a>';
        echo '<div class="buttons"><a href="#" class="card-footer-item is-danger">Delete</a>';
        echo '</div>';
        echo '</footer>';
        echo '</div>';
        echo "</div>";
      }
      ?>

    </div>
    <div class="column">
    </div>
    <div class="column">
    </div>

  </div>

</body>

</html>