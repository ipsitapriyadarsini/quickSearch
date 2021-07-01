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
            <div class="form-panel"><br>
              <div class="col-sm-12">  
                <h4 class="mb">Add the required inputs</h4>  
                    <form action="" method="POST">
                        <div class="form-group">  
                        <br> <input type="text" name="industry" class="form-control" placeholder="Add industry types"><br> 
                        </div>
                        <input type="submit" name="upload" class="btn btn-success btn-lg"  value="save"><br><br>
                        <?php if (isset($_POST['upload'])) {
                            $indus = $_POST['industry'];
                            $query = "INSERT INTO industry_table (industry_type) VALUES ('$indus')";
                            $result = mysqli_query($conn, $query);
                            if ($result) { ?>
                            <div class="alert alert-success"><?='Data inserted' ?></div>
                            <?php }
                        } ?>
                     </form> 
                </div>
        <!-- ***********************Update and delete table *********************------> 
        <?php         
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = mysqli_query($conn, "DELETE FROM industry_table WHERE id ='$id'");
          //header("location:industries.php");
         }
        ?>
       <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Industries name</th>   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM industry_table");
                  while($row = mysqli_fetch_array($result)){
                      ?>
                  <tr>
                    <td>
                      <?php echo $row['id']; ?>
                    </td>
                    <td> <?php echo $row['industry_type']; ?></td>
                    <td></td>
                    <td></td>
                    <td> 
                     <a href="update_industry.php?id=<?php echo $row['id']; ?>">                   
                      <button class="btn btn-primary btn-xs"> Edit</button></a> 
                      <a href="industries.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure to delete this!'); return false">
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