<?php
  include_once '../includes/partials/header_back.php';

  if(isset($_POST['add'])){
    // Connexion à la base de données
    $conn = mysqli_connect('localhost', 'root', '', 'library');
    if (!$conn) {
      die("La connexion a échoué: " . mysqli_connect_error());
    }

    // Échappement des valeurs
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $auteur = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id_categorie = mysqli_real_escape_string($conn, $_POST['categorie']);
    $quantite = mysqli_real_escape_string($conn, $_POST['quantite']);
    $borrowed = 0;

    // Vérification que id_categorie et quantite sont des nombres
    if (!is_numeric($id_categorie) || !is_numeric($quantite)) {
      die("id_categorie et quantite doivent être des nombres");
    }

    // Création du dossier pour le livre
    $bookDir = "tmp/book" . $id_categorie;
    if (!file_exists($bookDir)) {
      mkdir($bookDir, 0777, true);
    }

    // Enregistrement du fichier de couverture
    $cover = $_FILES['cover'];
    $coverDir = $bookDir . "/cover";
    if (!file_exists($coverDir)) {
      mkdir($coverDir, 0777, true);
    }
    $coverPath = $coverDir . "/" . basename($cover["name"]);
    if (is_uploaded_file($cover["tmp_name"])) {
      move_uploaded_file($cover["tmp_name"], $coverPath);
    } else {
      die("Erreur lors du téléchargement du fichier de couverture");
    }

    // Enregistrement du fichier PDF
    $pdf = $_FILES['pdf'];
    $pdfDir = $bookDir . "/pdf";
    if (!file_exists($pdfDir)) {
      mkdir($pdfDir, 0777, true);
    }
    $pdfPath = $pdfDir . "/" . basename($pdf["name"]);
    if (is_uploaded_file($pdf["tmp_name"])) {
      move_uploaded_file($pdf["tmp_name"], $pdfPath);
    } else {
      die("Erreur lors du téléchargement du fichier PDF");
    }

    // Vérification que les chemins coverPath et pdfPath sont corrects
    if (!file_exists($coverPath) || !file_exists($pdfPath)) {
      die("Les chemins coverPath et pdfPath ne sont pas corrects");
    }

    // Insertion des informations dans la base de données
    $sql = "INSERT INTO books (titre, auteur, description, id_categorie, quantite, borrowed, cover, pdf) VALUES ('$titre', '$auteur', '$description', $id_categorie, $quantite, $borrowed, '$coverPath', '$pdfPath')";

    if (mysqli_query($conn, $sql)) {
      echo "Le livre a été ajouté avec succès";
    } else {
      echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    
  }else{
    echo "erreur";
  }
?>
<div class="container" style="">
  <h2 style="font-weight:bold;">Ajouter un livre</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titre">Titre:</label>
      <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="form-group">
      <label for="author">Auteur:</label>
      <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group" style="display: flex; justify-content: space-between;">
      <div>
        <label for="cover">Cover:</label>
        <input type="file" class="form-control" id="cover" name="cover" onchange="loadImage(event)" accept="image/*">
      </div>
      <div>
        <div id="imagePreview" class="cover-file"></div>
      </div>
    </div>

    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
      <label for="categorie">Domaine:</label>
      <input type="text" class="form-control" id="categorie" name="categorie" value="30">
    </div>
    
    <div class="form-group">
      <label for="quantite">Quantité:</label>
      <input type="number" class="form-control" id="quantite" name="quantite">
    </div>
    <div class="form-group">
      <label for="pdf">PDF:</label>
      <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
    </div>
    <button type="submit" name="add" class="btn">Ajouter</button>
  </form>
</div>

<script>
      function loadImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('imagePreview');
          output.style.backgroundImage = "url('" + reader.result + "')";
          output.style.backgroundSize = "cover";
          output.style.height = "150px";
          output.style.width = "150px";
        };
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>

<?php
  include_once '../includes/partials/footer_back.php';
?>
