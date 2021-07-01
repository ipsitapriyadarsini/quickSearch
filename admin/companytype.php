<?php
include '../include/database.php';
include 'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <br>
              <h4 class="mb">Add the required inputs</h4>
              <br>
                <div class="col-sm-12">    
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">  
                    <input type="text" name="company" class="form-control" placeholder="Add company types"><br>
                    <input type="submit" name="commit" class="btn btn-success btn-lg"  value="save"><br><br>
                        </div>
                        <?php if (isset($_POST['commit'])){
                          $company = $_POST['company'];
                          $query = "INSERT INTO company_table (company_type) VALUES ('$company')";
                          $result = mysqli_query($conn, $query);
                          if ($result) { ?>
                          <div class="alert alert-success"><?='Data inserted' ?></div>
                          <?php }
                      } ?>
                     </form> 
                </div>
              
        <!-------***********************Sub-Category table *********************------>
        <?php         
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql = mysqli_query($conn, "DELETE FROM company_table WHERE id ='$id'");
          //header("location:industries.php");
         }
        ?>
       <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
              <hr>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th> Company type</th>   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn,"SELECT * FROM company_table");
                  while($row = mysqli_fetch_array($result)){
                      ?>
                  <tr>
                    <td>
                      <?php echo $row['id']; ?>
                    </td>
                    <td> <?php echo $row['company_type']; ?></td>
                    <td></td>
                    <td></td>
                    <td> 
                     <a href="update_company.php?id=<?php echo $row['id']; ?>">                   
                      <button class="btn btn-primary btn-xs"> Edit</button></a> 
                      <a href="companytype.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete &quot; <?php echo $row['company_type']; ?>&quot;'); return false">
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
          
   