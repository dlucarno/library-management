<?php
  include_once '../includes/partials/header_back.php';
?>

<div class="container" style="">
  <h2 style="font-weight:bold;">Ajouter un livre</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="titre">Titre:</label>
      <input type="text" class="form-control" id="titre" name="titre">
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
      <select class="form-control" id="categorie" name="categorie">
        <?php
        // Ici, vous devez récupérer les catégories disponibles dans votre base de données.
        // Par exemple, si vous avez un tableau de catégories, vous pouvez faire comme ceci:
        $categories = array("Catégorie 1", "Catégorie 2", "Catégorie 3"); // Remplacez ceci par votre propre code pour récupérer les catégories
        foreach($categories as $categorie) {
          echo "<option value=\"$categorie\">$categorie</option>";
        }
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="quantite">Quantité:</label>
      <input type="number" class="form-control" id="quantite" name="quantite">
    </div>
    <div class="form-group">
      <label for="pdf">PDF:</label>
      <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
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
