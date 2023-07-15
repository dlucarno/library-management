<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
      /test

        /* Ajout d'une bande horizontale blanche pour la navbar */
        .navbar {
            background-color: white;
            height: 50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        /* Ajout de différents menus avec des hover */
        .navbar a {
            text-decoration: none;
            color: black;
            padding: 10px;
        }

        .navbar a:hover {
            color: gray;
        }

        /* Ajout d'une sidebar pour les menus */
        .sidebar {
            height: 100%;
            width: 20%; /* Modification de la largeur à 30% */
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgb(13, 13, 107); /* Modification du fond en bleu */
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }
       
    </style>
    <title>Document</title>
</head>
<body>
    <!-- Ajout de la navbar -->
    
    <div class="navbar" style="width: 100%;">
        <a href="#">Menu 1</a>
        <a href="#">Menu 2</a>
        <a href="#">Menu 3</a>
    </div>

   
    
<div class="bookshelf">
    <div class="book-grid">
      <ul>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
      </ul>
    </div>
    <div class="shelf-shadows"></div>
    <div class="shelf"></div>
  </div>
  <div class="bookshelf">
    <div class="book-grid">
      <ul>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
      </ul>
    </div>
    <div class="shelf-shadows"></div>
    <div class="shelf"></div>
  </div>
  <div class="bookshelf">
    <div class="book-grid">
      <ul>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
      </ul>
    </div>
    <div class="shelf-shadows"></div>
    <div class="shelf"></div>
  </div>
  <div class="bookshelf">
    <div class="book-grid">
      <ul>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
        <li> <img src="assets/img/book1.webp"/></li>
      </ul>
    </div>
    <div class="shelf-shadows"></div>
    <div class="shelf"></div>
  </div>
</body>
</html>