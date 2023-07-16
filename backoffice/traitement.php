<?php
include_once('../database/database.php') ;

$id = $_GET['cat_del'];
function deleteCategory($id) {
    global $conn;
    $sql = "DELETE FROM Categories WHERE id=$id";
    mysqli_query($conn, $sql);
}

if (isset($_GET['cat_del'])) {
    deleteCategory($id);
    header('Location: list_category.php');
}




?>

