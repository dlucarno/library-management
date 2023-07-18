<?php
  include_once '../includes/partials/header_back.php';
 include_once '../includes/functions/function.php';

  if(isset($_POST['add'])){
    // Échappement des valeurs
    $title = mysqli_real_escape_string($conn, $_POST['titre']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id_categorie = mysqli_real_escape_string($conn, $_POST['categorie']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantite']);
    $borrowed_number = 0;

    // Vérification que id_categorie et quantite sont des nombres
    if (!is_numeric($id_categorie) || !is_numeric($quantity)) {
      die("id_categorie et quantite doivent être des nombres");
    }

    
    $bookDir = "../assets/books/";

    // Déterminer le repertoire d'ajout du fichier
    $upload_folder = $bookDir.DIRECTORY_SEPARATOR .$title."_".$author. DIRECTORY_SEPARATOR;
    if (file_exists($upload_folder)) {
        echo "Un dossier portant le même nom existe déjà dans le répertoire<br>";
    } else {
        if (!mkdir($upload_folder, 0777, true)) {
            echo "Erreur lors de la création du dossier";
        } else {
            chmod($upload_folder, 0777);
        }
    }

    // Enregistrer la couverture du livre
    $cover = $_FILES['cover'];
    $coverPath = $upload_folder . "/" . $title . "_" . $id_categorie . "." . pathinfo($cover["name"], PATHINFO_EXTENSION);
    if (is_uploaded_file($cover["tmp_name"])) {
      if (!is_writable($upload_folder)) {
        die("Permission de déplacement refusée");
      }
      if (!move_uploaded_file($cover["tmp_name"], $coverPath)) {
        die("Erreur lors du déplacement du fichier de couverture");
      }
    } else {
      die("Erreur lors du téléchargement du fichier de couverture");
    }

    // Enregistrer le PDF du livre
    $pdf = $_FILES['pdf'];
    $pdfPath = $upload_folder . "/" . $title . "_" . $id_categorie . "." . pathinfo($pdf["name"], PATHINFO_EXTENSION);
    if (is_uploaded_file($pdf["tmp_name"])) {
      if (!move_uploaded_file($pdf["tmp_name"], $pdfPath)) {
        die("Erreur lors du déplacement du fichier PDF");
      }
    } else {
      die("Erreur lors du téléchargement du fichier PDF");
    }
    // Vérification que les chemins coverPath et pdfPath sont corrects
    if (!file_exists($coverPath) || !file_exists($pdfPath)) {
      die("Les chemins coverPath et pdfPath ne sont pas corrects");
    }

    // Envoie dans la base de donnée
    createBook($title, $author, $description, $quantity, $borrowed_number, $coverPath, $pdfPath, $id_categorie);

  }



  if (isset($_GET['update_book'])) {
    $res = readBook($_GET['update_book']);
    $row = mysqli_fetch_assoc($res); 
    $quantity = $row['quantity'];
    $photo = $row['photo'];
    $pdf = $row['pdf'];
    $titre =  $row['title'];
    $id_category =  $row['id_category'];
  
  }
  
  
  if(isset($_POST['update'])){
    $categoryTitle = $_POST['categoryTitle'];
    $categoryId = $_GET['update_cat'];
    updateCategory($categoryId, $categoryTitle);
    header('Location: list_category.php');
  }


?>
<div class="container" style="">
  <h2 style="font-weight:bold;">Ajouter un livre</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titre">Titre:</label>
      <input type="text" class="form-control" id="titre" name="titre" value="<?php if (isset($_GET['update_book'])) { echo $row['title']; }?>">
    </div>
    <div class="form-group">
      <label for="author">Auteur:</label>
      <input type="text" class="form-control" id="author" name="author" value="<?php if (isset($_GET['update_book'])) { echo $row['author']; }?>">
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
      <textarea class="form-control" id="description" name="description"><?php if (isset($_GET['update_book'])) { echo $row['description']; }?></textarea>
    </div>

    <div class="form-group">
      <label for="categorie">Domaine:</label>
      <!-- <input type="text" class="form-control" id="categorie" name="categorie" value="30"> -->

      <select class="form-control" id="categorie" name="categorie">
      <?php
        $res = listAllCategories();
        $num = 1; // Initialiser le compteur
        while($row = mysqli_fetch_assoc($res)) {         
      ?>
        <option value="<?= $row['id']; ?>"  <?php if (isset($_GET['update_book']) AND ($row['id'] == $id_category) ) { echo "selected"; }?> ><?= $row['title']; ?></option>
      <?php
        }
        
      ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="quantite">Quantité:</label>
      <input type="number" class="form-control" id="quantite" name="quantite" value="<?php if (isset($_GET['update_book'])) { echo $quantity; }?>">

    </div>
    <div class="form-group">
      <label for="pdf">PDF:</label>
      <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
      <span><?php if (isset($_GET['update_book'])) { echo "<a href='$pdf' target='_blank'> $titre.pdf </a>"; }?></span>
    </div>
    <button type="submit" name="<?php if (isset($_GET['update_book'])) { echo "update" ; } else { echo "add" ; }?>" class="btn"><?php if (isset($_GET['update_book'])) { echo "Modifier" ; } else { echo "Ajouter" ; }?></button>
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

      window.onload = function(){
        var output = document.getElementById('imagePreview');
          output.style.backgroundImage = "url('<?php if (isset($_GET['update_book'])) { echo $photo; }?>')";
          output.style.backgroundSize = "cover";
          output.style.height = "150px";
          output.style.width = "150px";
        };
    </script>

<?php
  include_once '../includes/partials/footer_back.php';
?>



