<?php
  include_once '../includes/partials/header_back.php';
  include_once '../includes/bootstrap.php';
  ?>

<?php
  // Récupérer les informations de l'utilisateur
  $user = $_SESSION['user'];

  // Récupérer la liste des livres empruntés
  $books = getBorrowedBooks($user['id']);
?>

<div class="profile">
  <h2>Profil de l'utilisateur</h2>
  <form method="post" action="update_profile.php">
    <p>Nom: <input type="text" name="nom" value="<?php echo $user['nom']; ?>"></p>
    <p>Prénom: <input type="text" name="prenom" value="<?php echo $user['prenom']; ?>"></p>
    <p>Email: <input type="text" name="email" value="<?php echo $user['email']; ?>"></p>

    <input type="submit" value="Modifier les informations">
  </form>

  <h3>Livres empruntés:</h3>
  <ul>
    <?php foreach($books as $book): ?>
      <li>
        <?php echo $book['title']; ?>
        <a href="<?php echo $book['pdf_link']; ?>" target="_blank">Lire le livre</a>
      </li>
    <?php endforeach; ?>
  </ul>
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
  .profile p, .profile li {
    color: #666;
  }
</style>
  

<?php
  include_once '../includes/partials/footer_back.php';
  ?>
