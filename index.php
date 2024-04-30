<?php
include("header.php");
include("db.php");
?>
<div class="box-1">
<h2>ALL BOOKS</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Book</button>
</div>
        
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            
            $query = "select * from books";


            $result = mysqli_query($con, $query);

            if (!$result) {
                die("QUERY FAILED". mysqli_error($con));
            }
            else {
                while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["publication_year"]; ?></td>
            </tr>

                <?php
                }
            }


            
            
            
            ?>
            
        </tbody>
    </table>
    <!-- Modal -->
    <form action="">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> New Book Entry</h5>
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
        <button type="button" class="btn btn-success">Add Book</button>
      </div>
    </div>
  </div>
</div>
</form>

    <?php
include("footer.php");
?>