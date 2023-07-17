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
      // Définir une image de couverture par défaut
      window.onload = function() {
        var output = document.getElementById('imagePreview');
        output.style.backgroundImage = "url('../assets/img/background.jpg')";
        output.style.backgroundSize = "cover";
        output.style.height = "150px";
        output.style.width = "150px";
      }
    </script>
    <form method="POST" action="add_book_process.php">
      <div class="form-group">
        <label for="bookTitle">Titre du livre</label>
        <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
      </div>
      <div class="form-group">
        <label for="bookAuthor">Auteur du livre</label>
        <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" required>
      </div>
      <div class="form-group">
        <label for="bookPublisher">Éditeur du livre</label>
        <input type="text" class="form-control" id="bookPublisher" name="bookPublisher" required>
      </div>
      <div class="form-group">
        <label for="bookYear">Année de publication</label>
        <input type="number" class="form-control" id="bookYear" name="bookYear" required>
      </div>
      <div class="form-group">
        <label for="bookCover">Couverture du livre</label>
        <input type="file" class="form-control" id="bookCover" name="bookCover" accept="image/*" onchange="loadImage(event)" required>
        <div id="imagePreview"></div>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter le livre</button>
    </form>
