<?php
include '../include/database.php';
include 'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="content_style.css">
    <title>Document</title>
</head>
<body>
<section id="main-content">
      <section class="wrapper">
        <!-- INPUT MESSAGES -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb">Add the required inputs</h4>
              
                <div class="col-sm-12">    
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">  
                    <br>
                    <input type="text" name="qualification" class="form-control" placeholder="Add qualifications"><br>
                    <input type="submit" name="enter" class="btn btn-success btn-lg"  value="save"><br><br>
                        </div>
                        <?php if (isset($_POST['enter'])){
                   
                          $qualification = $_POST['qualification'];
                          $query = "INSERT INTO qualification_table (qualification) VALUES ('$qualification')";
                          $result = mysqli_query($conn, $query);
                          if ($result) { ?>
                          <div class="alert alert-success"><?='Data inserted' ?></div>
                          <?php }
                      } ?>
                        </div>
                     </form> 
                </div>
              
        <!--***********************Sub-Category table *********************------>
        <?php         
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = mysqli_query($conn, "DELETE FROM qualification_table WHERE id ='$id'");
          //header("location:industries.php");
         }
        ?>
       <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th> Qualification</th>   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM qualification_table");
                  while($row = mysqli_fetch_array($result)){
                      ?>
                  <tr>
                    <td>
                      <?php echo $row['id']; ?>
                    </td>
                    <td> <?php echo $row['qualification']; ?></td>
                    <td></td>
                    <td></td>
                    <td> 
                     <a href="update_qualification.php?id=<?php echo $row['id']; ?>">                   
                      <button class="btn btn-primary btn-xs"> Edit</button></a> 
                      <a href="qualification.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete &quot; <?php echo $row['qualification']; ?>&quot;'); return false">
                      <button class="btn btn-danger btn-xs">Delete</button></a> </td>
                  </tr>
                  <?php 
                     }
                      ?>         
                </tbody>
              </table> 
             </div>
          </div>
      </section>
    </section>
 </body>
</html>