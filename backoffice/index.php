<?php
  include_once '../includes/partials/header_back.php';
  ?>


  
  <h2>Nos livres</h2>
  <div class="mon-tableau">
    <table cellpadding="0" cellspacing="0" >
      <tr class="special-tr">
        <td>Livres</td>
        <td>Titres</td>
        <td>Catégories</td>
        <td>Actions</td>
      </tr>
      <tr>
        
        <td><img src="../assets/img/book1.webp"  width="70px"></td>
        <td>Le Prince Perdu</td>
        <td>Fantastique</td>
        <td>
          <button type="button">Supprimer</button>
          <button type="button">Modifier</button>
        </td>
      </tr>
      <tr>
      <td><img src="../assets/img/book1.webp"  width="70px"></td>
        <td>Le Prince Perdu</td>
        <td>Fantastique</td>
        <td>
          <button type="button">Supprimer</button>
          <button type="button">Modifier</button>
        </td>
      </tr>
      <tr>
      <td><img src="../assets/img/book1.webp"  width="70px"></td>
        <td>Le Prince Perdu</td>
        <td>Fantastique</td>
        <td>
          <button type="button">Supprimer</button>
          <button type="button">Modifier</button>
        </td>
      </tr>
      
    </table>
    </div>
    <div class="pagination" style="display: flex; justify-content: center; padding: 20px;">
      <ul style="list-style-type: none; display: flex;">
        <li style="margin: 0 10px;"><a href="#" style="text-decoration: none; color: black;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='';">Précédent</a></li>
        <li style="margin: 0 10px;"><a href="#" style="text-decoration: none; color: black;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='';">1</a></li>
        <li style="margin: 0 10px;"><a href="#" style="text-decoration: none; color: black;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='';">2</a></li>
        <li style="margin: 0 10px;"><a href="#" style="text-decoration: none; color: black;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='';">3</a></li>
        <li style="margin: 0 10px;"><a href="#" style="text-decoration: none; color: black;" onmouseover="this.style.backgroundColor='gray';" onmouseout="this.style.backgroundColor='';">Suivant</a></li>
      </ul>
      
    </div>
    
  </div>
 <?php
  include_once '../includes/partials/footer_back.php';
?>