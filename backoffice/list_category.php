<?php
  include_once '../includes/partials/header_back.php';
  include_once '../includes/functions/function.php';
  ?>


<h2>Nos Categories</h2>
  <div class="mon-tableau">
    <table cellpadding="0" cellspacing="0" >
      <tr class="special-tr">
        <td>N°</td>
        <td>Titre</td>
        <td>Action</td>
      </tr>

      <?php
      $res = listAllCategories();
      $num = 1; // Initialiser le compteur
      while($row = mysqli_fetch_assoc($res)) {
        
         
     ?>
    
      <tr>
        <td><?php echo $num++; // Auto-incrémentation du numéro ?></td>
        <td><?php echo $row['title']?></td>
        <td>
          

     
     
          
          <button type="button" onclick="deleteCategory(<?php echo $row['id']; ?>)">Supprimer</button>
          <script>
            function deleteCategory(id) {
              if(confirm("Êtes-vous sûr de vouloir supprimer cette catégorie?")) {
                window.location.href = './traitement.php?cat_del=' + id;
              }
            }
          </script>
        
          
          

          <button type="button" onclick="window.location.href='./add_category.php?update_cat=<?php echo $row['id']; ?>'">Modifier</button>
        </td>
      </tr>
     
     <?php
     
    
    }
    
    ?>
    </table>
  </div>
  
  <?php
  
  include_once '../includes/partials/footer_back.php';
  ?>
