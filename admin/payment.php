<?php
include '../include/database.php';
// include 'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../users/profile2_style.css">
    <title>payment details</title>
</head>
<body>
<?php
if (isset($_POST['commit'])){
  $package_id=$_POST['package_id'];
  $pkg_name=$_POST['pkg_name'];
  $pkg_type=$_POST['pkg_type'];
  $change_date=$_POST['change_date'];
  $description=$_POST['description'];
  $features=$_POST['features'];
//   $sql="INSERT INTO package (package_id,package_name,package_type,change_date,desc,features) VALUES ('$package_id','$pkg_name','$pkg_type','$change_date','$descriptiopn','$features')";

$sql="INSERT INTO `package`(`package_id`, `package_name`, `package_type`, `change_date`, `description`, `features`) VALUES ('$package_id','$pkg_name','$pkg_type','$change_date','$description','$features')";
$result=mysqli_query($conn, $sql);
}
?>
<div class="profile">
  <h1>Packages for our premium membership</h1>
  <form method="post" action="" id="myForm"> 
    <div><input type="text" name="package_id" placeholder="Enter package id no."></div><br>
    <div ><input type="text" name="pkg_name"  placeholder="Enter package name"></div ><br>
    <div ><input type="text" name="pkg_type"  placeholder="Enter package type"></div><br>
    <div >Change Date:<input type="date" name="change_date" placeholder="Change date"></div><br>
    <!-- <div ><input type="text" name="" placeholder =""></div><br> -->
    <div ><input type="text" name="description" placeholder ="Enter package description"></div ><br>
    <div ><input type="text" name="features" placeholder="Features for packages"></div ><br>
    <br>
    <div class="submit"><input type="submit" name="commit" value="SAVE"></div>
</form>
</div>
</body>
</html>