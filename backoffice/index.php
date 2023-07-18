<?php
  include_once '../includes/partials/header_back.php';
 include_once '../includes/functions/function.php';
?>


  
  <h2>Nos livres</h2>
  <div class="mon-tableau">
    <table cellpadding="0" cellspacing="0" >
      <tr class="special-tr">
        <td>Livres</td>
        <td>Titres</td>
        <td>Catégories</td>
        <td>Quantité</td>
        <td>Nombre d'emprunt</td>
        <td>Actions</td>
      </tr>

      <?php
        $res = listAllBook();
        while($row = mysqli_fetch_assoc($res)) {  
      ?>
      <tr>
        <td><img src="<?= $row['photo']; ?>"  width="70px"></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['author']; ?></td>
        <td><?= $row['quantity']; ?></td>
        <td><?= $row['borrowed_number']; ?></td>
        <td>
        <button type="button" onclick="deleteCategory(<?php echo $row['id']; ?>)">Supprimer</button>
          <script>
            function deleteCategory(id) {
              if(confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
                window.location.href = './traitement.php?book_del=' + id;
              }
            }
          </script>
          <button type="button" onclick="window.location.href='./add_book.php?update_book=<?php echo $row['id']; ?>'">Modifier</button>
        </td>
      </tr>
      <?php
        }
      ?>

    </table>
    </div>
    <?php
  function getTotalPages() {
    $conn = mysqli_connect("localhost", "root", "", "library");
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM books");
    $row = mysqli_fetch_assoc($result);
    $total_pages = ceil($row['total'] / 4);
    return $total_pages;
  }

  function getCurrentPage() {
    if(isset($_GET['page'])) {
      return $_GET['page'];
    } else {
      return 1;
    }
  }

  $total_pages = getTotalPages();
  $current_page = getCurrentPage();
  $items_per_page = 4;
  $offset = ($current_page - 1) * $items_per_page;
?>

<?php
  $conn = mysqli_connect("localhost", "root", "", "library");
  $result = mysqli_query($conn, "SELECT * FROM books LIMIT $items_per_page OFFSET $offset");
  while($row = mysqli_fetch_assoc($result)) {
    // Affichez vos éléments ici
  }
?>
    <?php
  $query_params = $_GET; // Obtenez tous les paramètres GET existants
?>
<ul class="pagination-list">
  <?php if($current_page > 1): ?>
    <?php
      $query_params['page'] = $current_page - 1; // Modifiez le paramètre de page
      $query_string = http_build_query($query_params); // Générez la chaîne de requête
    ?>
    <li><a href="?<?php echo $query_string; ?>" class="pagination-link" data-hover="gray">Précédent</a></li>
  <?php endif; ?>
  <?php for($page = 1; $page <= $total_pages; $page++): ?>
    <?php
      $query_params['page'] = $page; // Modifiez le paramètre de page
      $query_string = http_build_query($query_params); // Générez la chaîne de requête
    ?>
    <li><a href="?<?php echo $query_string; ?>" class="pagination-link <?php echo $page == $current_page ? 'active' : ''; ?>" data-hover="gray"><?php echo $page; ?></a></li>
  <?php endfor; ?>
  <?php if($current_page < $total_pages): ?>
    <?php
      $query_params['page'] = $current_page + 1; // Modifiez le paramètre de page
      $query_string = http_build_query($query_params); // Générez la chaîne de requête
    ?>
    <li><a href="?<?php echo $query_string; ?>" class="pagination-link" data-hover="gray">Suivant</a></li>
  <?php endif; ?>
</ul>
</ul>

    <style>
      .pagination {
        display: flex;
        justify-content: center;
        padding: 20px;
      }

      .pagination-list {
        list-style-type: none;
        display: flex;
      }

      .pagination-list li {
        margin: 0 10px;
      }

      .pagination-link {
        text-decoration: none;
        color: black;
      }

      .pagination-link:hover {
        background-color: gray;
      }
    </style>
    
  </div>
 <?php
  include_once '../includes/partials/footer_back.php';
?>

