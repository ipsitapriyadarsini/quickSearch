<?php
include '../include/database.php';
session_start();
$query = "SELECT industry_type FROM industry_table";
$retrive = mysqli_query($conn,$query);
if (isset($_POST['commit'])) {
    $user = $_SESSION['user'];
    $ind = $_POST['industry'];
    $name = $_POST['cname'];
    $reg = $_POST['reg_no'];
    $type = $_POST['types'];
    $date = $_POST['rdate'];
    $dir = $_POST['director'];
    $ofc = $_POST['office'];
    $addrs = $_POST['addrs'];
    
    $sql = "INSERT INTO company_registration (username,industry,company_name,reg_no,company_type,reg_date,director,head_office,company_address,curent_date) VALUES ('$user','$ind','$name','$reg','$type','$date','$dir', '$ofc','$addrs',Now())";
    $result = mysqli_query($conn, $sql);

    $retrive = mysqli_query(
        $conn,
        "SELECT username,is_profile_update FROM user_login WHERE username ='$user'"
    );
    $rows = mysqli_fetch_array($retrive);
    $hide = $_POST['hide'];
    $uname = $rows['username'];
    $update = mysqli_query(
        $conn,
        "UPDATE user_login SET is_profile_update ='$hide' WHERE username ='$uname'"
    );
    header('location:company_dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile_style.css">
    <title>Company profile</title>
</head>
<body>
<div class="profile">
  <h1>PROFILE REGISTRATION FORM</h1>
  <form method="post" action="" id="myForm"> 
  <p><select name="industry">
  
    <option value="">Select industry type</option>
    <?php 
  $qry = mysqli_query($conn,"SELECT * fROM industry_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option  value="<?php echo $rows["industry_type"]; ?>"><?php echo $rows['industry_type'] ?></option>
  <?php } ?>

    </select></p>
    <p><input type="text" name="cname"  placeholder="Enter your company's name"></p>
    <p><input type="text" name="reg_no"  placeholder="Registration number"></p>
    <p><select name="types">
    <option value="">Select company type</option>
    <?php 
	$qrys=mysqli_query($conn,"SELECT * FROM company_table");
	while($srow=mysqli_fetch_array($qrys)){
	?>
    <option value="<?php echo $srow["company_type"]; ?>"><?php echo $srow['company_type'] ?></option>
	<?php } ?>
    
    </select></p>
    <p>Date of incorporation<input type="date" name="rdate" placeholder="Date of incorporation"></p>
    <p><input type="text" name="director" placeholder="Director name of company"></p>
    <p><input type="text" name="office" placeholder="Company's head office"></p>
    <p><input type="text" name="addrs" placeholder="Company's address"></p>
    <!-- <input type="hidden" name="date" value=""> -->

    <input type="hidden" name="hide" value="1">
    <p class="submit"><input type="submit" name="commit" value="SUBMIT"></p>
</form>
</div>  
</body>
</html>