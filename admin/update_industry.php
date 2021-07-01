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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<section id="main-content">
      <section class="wrapper">
        <!-- INPUT MESSAGES -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel"><br>
              <h4 class="mb">Add the required inputs</h4>
                 <div class="col-sm-12">    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <?php
                            $id= $_GET['id'];
                            $query = "SELECT industry_type FROM industry_table WHERE id='$id'";
                            $result = mysqli_query($conn, $query);
                           while( $row = mysqli_fetch_array($result)){
                            ?>  
                            <br> 
                            <input type="text" name="industry" class="form-control" value="<?php echo $row['industry_type']; ?>" placeholder="Add industry types"><br> 
                            </div>
                            <a href="industries.php?id=<?php echo $row['id']; ?>">
                            <input type="submit" name="upload" class="btn btn-success btn-lg"  value="Update"><br><br>
                            <?php }
                            ?>
                            </form> 
                           <?php 
                           if (isset($_POST['upload'])) {
                            $id= $_GET['id'];
                            $indus = $_POST['industry']; 
                            $query = "UPDATE industry_table SET industry_type ='$indus' WHERE id = '$id'";
                            $result = mysqli_query($conn, $query);
                            if ($result) { 
                            header('location:industries.php');
                             }
                        } ?>
                </div>
               