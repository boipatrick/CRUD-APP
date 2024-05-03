<?php include ("header.php");?>
<?php include ("db.php");?>

<?php 

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select * from books where id = '$id'";
    $result = mysqli_query($con, $query);

    if(!$result) {
        die("Couldn't Update Book".mysqli_error($con));
    }else {
        $row = mysqli_fetch_array($result); 
    }
}


?>

    <?php


    if(isset($_POST['update_book'])){

        if(isset($_GET['id_new'])) {
            $idnew = $_GET['id_new'];
        }
        
        


        $title = $_POST["b_title"];
        $author = $_POST["a_name"];
        $genre = $_POST["b_genre"];
        $year = $_POST["p_year"];


        $query = "update books set title = '$title', author = '$author', genre = '$genre', publication_year = '$year' where id = '$idnew'";
        $result = mysqli_query($con, $query);

        if(!$result) {
            die("Couldn't Update Book".mysqli_error($con));
        }else {
            header("location:index.php?update_msg=Success");
           
        }
    }

    ?>
    <form action="update.php?id_new=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="b_title">Title</label>
                <input type="text" name="b_title" class="form-control" value="<?php echo $row["1"]?>">

            </div>
            <div class="form-group">
                <label for="a_name">Author</label>
                <input type="text" name="a_name" class="form-control" value="<?php echo $row["2"]?>">
                
            </div>
            <div class="form-group">
                <label for="b_genre">Genre</label>
                <input type="text" name="b_genre" class="form-control" value="<?php echo $row["3"]?>">
                
            </div>
            <div class="form-group">
                <label for="p_year">Publication Year</label>
                <input type="number" name="p_year" class="form-control" value="<?php echo $row["4"]?>">
                <input type="submit" class="btn btn-success" name="update_book" value="Update">
                
            </div>

    </form>
    



<?php include ("footer.php");?>