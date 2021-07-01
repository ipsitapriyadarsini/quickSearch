<?php
include '../include/database.php';
// include '../admin/admin_dashboard.php';
session_start();
 $id= $_GET['id'];
 $query = "SELECT * FROM company_registration WHERE id = '$id'";
 $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile_style.css">
    <title>Company profile</title>
    <style>
    body{
        background:none;
    }
    </style>
</head>
<body>
<?php 
 $id= $_GET['id'];
    if (isset($_POST['commit'])) { 
      $indus = $_POST['industry'];
      $name = $_POST['cname'];
      $reg = $_POST['reg_no'];
      $type = $_POST['types'];
      $date = $_POST['rdate'];
      $dir = $_POST['director'];
      $ofc = $_POST['office'];
      $addrs = $_POST['addrs']; 
        echo $query = "UPDATE company_registration SET industry ='$indus',company_name ='$name',reg_no = '$reg',company_type = '$type',reg_date = '$date',director = '$dir',head_office = '$ofc',company_address = '$addrs',modified_date = Now() WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) { 
			header('location:http://localhost/quickSearch/admin/company_pagination.php');
		}
  } ?> 
<div class="profile">
  <h1>PROFILE REGISTRATION FORM</h1>
  <form method="post" action="" id="myForm">
  <?php
$row = mysqli_fetch_array($result);
?> 
  <p><select name="industry">
  <?php 
  $qry = mysqli_query($conn,"SELECT * fROM industry_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option value="<?php echo $rows["industry_type"]; ?>" <?php if($rows["industry_type"]==$row['industry']){ ?>selected="selected"<?php } ?>><?php echo $rows['industry_type'] ?></option>
  <?php } ?>
    </select></p>
    <p><input type="text" name="cname" value="<?php echo $row["company_name"]?>" placeholder="Enter your company's name"></p>
    <p><input type="text" name="reg_no" value="<?php echo $row["reg_no"]?>" placeholder="Registration number"></p>
    <p><select name="types">
	<?php 
	$qrys=mysqli_query($conn,"SELECT * FROM company_table");
	while($srow=mysqli_fetch_array($qrys)){
	?>
    <option value="<?php echo $srow["company_type"]; ?>" <?php if($srow["company_type"]==$row["company_type"]){ ?>selected="selected"<?php } ?>> <?php echo $srow['company_type'] ?></option>
	<?php } ?>
    </select></p>
    <p><input type="date" name="rdate" value="<?php echo $row["reg_date"]?>" placeholder="Date of incorporation"></p>
    <p><input type="text" name="director" value="<?php echo $row["director"]?>" placeholder="Director name of company"></p>
    <p><input type="text" name="office" value="<?php echo $row["head_office"]?>" placeholder="Company's head office"></p>
    <p><input type="text" name="addrs" value="<?php echo $row["company_address"]?>" placeholder="Company's address"></p>
    <input type="hidden" name="modified-date" value="">
    <input type="hidden" name="hide" value="1">
    <p class="submit"><input type="submit" name="commit" value="UPDATE"></p>
</form>
</div> 
</body>
</html>