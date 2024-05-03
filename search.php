<!-- search.php -->
<?php
include("db.php");

if(isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Construct SQL query
    $query = "SELECT * FROM `books` WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("QUERY FAILED: " . mysqli_error($con));
    }

    // Display search results
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Display book information
            echo "Title: " . $row['title'] . "<br>";
            echo "Author: " . $row['author'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No results found.";
    }
}
?>