<?php
include_once('../database/database.php') ;
 
// Ceci est le CRUD de Book
function createBook($title, $author, $description, $quantity, $borrowed_number, $photo, $pdf, $id_categories) {
    global $conn;
    $sql = "INSERT INTO Books (title, author, description, quantity, borrowed_number, photo, pdf, id_categories) VALUES ('$title', '$author', '$description', $quantity, $borrowed_number, '$photo', '$pdf', $id_categories)";
    mysqli_query($conn, $sql);
}

function readBook($id) {
    global $conn;
    $sql = "SELECT * FROM Books WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateBook($id, $title, $author, $description, $quantity, $borrowed_number, $photo, $pdf, $id_categories) {
    global $conn;
    $sql = "UPDATE Books SET title='$title', author='$author', description='$description', quantity=$quantity, borrowed_number=$borrowed_number, photo='$photo', pdf='$pdf', id_categories=$id_categories WHERE id=$id";
    mysqli_query($conn, $sql);
}

function deleteBook($id) {
    global $conn;
    $sql = "DELETE FROM Books WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fin CRUD de Book



// CRUD de User

function createUser($firstname, $lastname, $email, $password, $status) {
    global $conn;
    $sql = "INSERT INTO Users (firstname, lastname, email, password, status) VALUES ('$firstname', '$lastname', '$email', '$password', $status)";
    mysqli_query($conn, $sql);
}

function readUser($id) {
    global $conn;
    $sql = "SELECT * FROM Users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateUser($id, $firstname, $lastname, $email, $password, $status) {
    global $conn;
    $sql = "UPDATE Users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', status=$status WHERE id=$id";
    mysqli_query($conn, $sql);
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM Users WHERE id=$id";
    mysqli_query($conn, $sql);
}


// Fin CRUD de User


//CRUD de Category

function createCategory($title) {
    global $conn;
    $sql = "INSERT INTO Categories (title) VALUES ('$title')";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "La catégorie a bien été ajoutée";
      }else{
        echo "La catégorie n'a pas été ajoutée";
      }
   
  }

function listAllCategories() {
    global $conn;
    $sql = "SELECT * FROM Categories";
    $result = mysqli_query($conn, $sql);
   return $result;
}

function readCategory($id) {
    global $conn;
    $sql = "SELECT * FROM Categories WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    // return mysqli_fetch_assoc($result);
    return $result;
}


function updateCategory($id, $title) {
    global $conn;
    $sql = "UPDATE Categories SET title='$title' WHERE id=$id";
    mysqli_query($conn, $sql);
}


// Fin CRUD de Category



//CRUD de Borrowing et fonctions associées comme checkBorrowing

function createBorrowing($id_users, $id_book) {
    global $conn;
    // Récupérer les détails du livre
    $bookDetails = readBook($id_book);
    // Vérifier la disponibilité du livre
    if ($bookDetails['quantity'] - $bookDetails['borrowed_number'] > 0) {
        // Vérifier si l'utilisateur peut emprunter
        if (checkBorrowing()) {
            $sql = "INSERT INTO Borrowing (id_users, id_book) VALUES ($id_users, $id_book)";
            mysqli_query($conn, $sql);
        } else {
            echo "L'utilisateur ne peut plus emprunter de livres.";
        }
    } else {
        echo "Le livre n'est pas disponible pour l'emprunt.";
    }
}

function updateBorrowing($id, $id_users, $id_book) {
    global $conn;
    $sql = "UPDATE Borrowing SET id_users=$id_users, id_book=$id_book WHERE id=$id";
    mysqli_query($conn, $sql);
}


function checkBorrowing() {
    global $conn;
    $id_users = $_SESSION['id']; // On utilise l'ID de l'utilisateur connecté
    $sql = "SELECT COUNT(*) as count FROM Borrowing WHERE id_users=$id_users";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    if ($data['count'] >= 3) {
        return false; // L'utilisateur ne peut plus emprunter de livres
    } else {
        return true; // L'utilisateur peut encore emprunter des livres
    }
}


function deleteBorrowing($id) {
    global $conn;
    $sql = "DELETE FROM Borrowing WHERE id=$id";
    mysqli_query($conn, $sql);
}


// Fin CRUD de Borrowing
?>