<?php
include("header.php");
include("db.php");

// Check if the form is submitted
if(isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Construct SQL query for search
    $query = "SELECT * FROM `books` WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("QUERY FAILED: " . mysqli_error($con));
    }
} else {
    // If no search query, retrieve all books
    $query = "SELECT * FROM `books`";
    $result = mysqli_query($con, $query);
}

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <div class="box-1">
                <h2>ALL BOOKS</h2>
                <!-- Search Form -->
                <form class="d-flex" action="index.php" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search by title or author" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
            
            <table class="table table-hover table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Publication Year</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["author"]; ?></td>
                                <td><?php echo $row["genre"]; ?></td>
                                <td><?php echo $row["publication_year"]; ?></td>
                                <td><a href="update.php?id=<?php echo $row["id"];?>" class="btn btn-success">Update</a></td>
                                <td><a href="delete.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>No results found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <div class="box-1">
                <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Book</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Book Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="b_title">Title</label>
                        <input type="text" name="b_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="a_name">Author</label>
                        <input type="text" name="a_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="b_genre">Genre</label>
                        <input type="text" name="b_genre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="p_year">Publication Year</label>
                        <input type="number" name="p_year" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_book" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include("footer.php");
?>
