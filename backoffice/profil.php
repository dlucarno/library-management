<?php
  include_once '../includes/partials/header_back.php';
  include_once '../includes/functions/function.php';
?>

<div class="profile">
  <h2>Profil de l'utilisateur</h2>
  <form method="post" action="update_profile.php">
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="prenom">Prénom:</label>
      <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Modifier les informations</button>
  </form>

  <h3 style="text-align: center;">Livres empruntés:</h3>

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
          <button type="button">Lire</button>
          <button type="button">Retourner</button>
        </td>
      </tr>
      <tr>
      <td><img src="../assets/img/book1.webp"  width="70px"></td>
        <td>Le Prince Perdu</td>
        <td>Fantastique</td>
        <td>
          <button type="button">Lire</button>
          <button type="button">Retourner</button>
          
        </td>
      </tr>
      <tr>
      <td><img src="../assets/img/book1.webp"  width="70px"></td>
        <td>Le Prince Perdu</td>
        <td>Fantastique</td>
        <td>
          <button type="button">Lire</button>
          <button type="button">Retourner</button>
        </td>
      </tr>
    </table>
  </div>
  
</div>

<style>
  .profile {
    width: 80%;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .profile h2, .profile h3 {
    color: #333;
  }
  .profile .form-group, .profile .list-group-item {
    color: #666;
  }
  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }
</style>

<?php
  include_once '../includes/partials/footer_back.php';
?>
