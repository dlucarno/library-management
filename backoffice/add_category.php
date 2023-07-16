<?php
  include_once '../includes/partials/header_back.php';
 include_once '../includes/functions/function.php';
  ?>
<?php

if(isset($_POST['add'])){
  $categoryTitle = $_POST['categoryTitle'];
  createCategory($categoryTitle);
}

if (isset($_GET['update_cat'])) {
  $res = readCategory($_GET['update_cat']);
  $row = mysqli_fetch_assoc($res); 
  $categoryId = $row['id'];
  $categoryTitle = $row['title'];

}


if(isset($_POST['update'])){
  $categoryTitle = $_POST['categoryTitle'];
  $categoryId = $_GET['update_cat'];
  updateCategory($categoryId, $categoryTitle);
  header('Location: list_category.php');
}


?>


<form action="" method="post" style="width: 300px; margin: auto;">
  <div class="form-group" style="margin-bottom: 15px;">
    <label for="categoryTitle" style="display: block; margin-bottom: 5px;">Titre de la catégorie</label>
    <input type="text" class="form-control" value="<?php if (isset($_GET['update_cat'])) { echo $categoryTitle ; }?>"
    id="categoryTitle" name="categoryTitle" required style="padding: 5px;">
  </div>
  <button type="submit" name="<?php if (isset($_GET['update_cat'])) { echo "update" ; } else { echo "add" ; }?>" class="btn" style="width: 100%; padding: 10px;"><?php if (isset($_GET['update_cat'])) { echo "Modifier" ; } else { echo "Ajouter" ; }?></button>
</form>
    

<?php
  include_once '../includes/partials/footer_back.php';
  ?>