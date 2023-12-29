<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
  include_once('formulaires/entete.html');
  ?>
  <div class="row">
    <div class="col-md-9">
      <div id="demo" class="carousel slide text-center" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <h1 class="text-center text-success">Dernières acquisitions</h1>
        <div class="carousel-inner text-center">
          <?php
          require_once('conf/connexion.php');
          $requete = $connexion->prepare("SELECT * FROM LIVRE ORDER BY dateajout DESC LIMIT 2 ");
          $requete->execute();
          $res = $requete->fetch(PDO::FETCH_OBJ);
          echo'<div class="carousel-item active">';
          echo'<img src="images/'.$res->image.' "width="70%" height="45%">';
          echo'</div>';
          while($res = $requete->fetch(PDO::FETCH_OBJ)){
            echo'<div class="carousel-item">';
            echo'<img src="images/'.$res->image.'"width="70%" height="45%">';
            echo'</div>';
          }
          ?>
        </div>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
        <!-- Carousel -->
        <div class="container-fluid">
          <h3 class="text-center">(Carrousel)</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <?php
      include_once('authentification.php');
      ?>
    </div>
  </div>
</body>
</html>