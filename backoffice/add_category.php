<?php
  include_once '../includes/partials/header_back.php';
 include_once '../includes/functions/function.php';
  ?>


<?php



if(isset($_POST['button'])){
  $categoryTitle = $_POST['categoryTitle'];
  createCategory($categoryTitle);
}
?>


<form action="" method="post" style="width: 300px; margin: auto;">
  <div class="form-group" style="margin-bottom: 15px;">
    <label for="categoryTitle" style="display: block; margin-bottom: 5px;">Titre de la catégorie</label>
    <input type="text" class="form-control" id="categoryTitle" name="categoryTitle" required style="padding: 5px;">
  </div>
  <button type="submit" name="button" class="btn" style="width: 100%; padding: 10px;">Ajouter</button>
</form>
    

<?php
  include_once '../includes/partials/footer_back.php';
  ?>