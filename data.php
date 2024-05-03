<?php
include("db.php");

if(isset($_POST['add_book'])) {
    
    $title = $_POST['b_title'];
    $author = $_POST['a_name'];
    $genre = $_POST['b_genre'];
    $publication_year = $_POST['p_year'];



    if($title == "" || empty($title)){
        header('location:index.php?message=Please enter a title');
    }
    else{
        $query = "insert into books(title, author, genre, publication_year) values('$title', '$author', '$genre', '$publication_year')";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("QUERY FAILED". mysqli_error($con));
        }
        else {
            header('location:index.php?insert_msg=Book added successfully');
        }
    }
}









?>