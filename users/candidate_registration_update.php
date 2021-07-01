<?php
include '../include/database.php';
// include '../admin/admin_dashboard.php';
session_start();
 $id= $_GET['id'];
 $query = "SELECT * FROM candidate_registration WHERE id = '$id'";
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
if (isset($_POST['commit'])) {
    $user = $_SESSION['user'];
    $cname = $_POST['cname'];
    $fname = $_POST['fname'];
    $bdate = $_POST['bdate'];
    $email = $_POST['email_id'];
    $phno = $_POST['phno'];
    $quali = $_POST['qualification'];
    $yexp = $_POST['yexp'];
    $pre_comp = $_POST['pre_comp'];
    $doj = $_POST['doj'];
    $dol = $_POST['dol'];
    $qury = "UPDATE candidate_registration SET username ='$user',candidate_name ='$cname',father_name ='$fname',dob = '$bdate',email_id= '$email',phno = '$phno',qualifications = '$quali',yr_exp = '$yexp',pre_comp = '$pre_comp',doj='$doj',dol='$dol',modified_date = Now() WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    // echo $qury;
    if ($result) { 
        header('location:http://localhost/quickSearch/admin/candidate_pagination.php');
    }
} ?> 
<div class="profile">
  <h1>PROFILE REGISTRATION FORM</h1>
  <form method="post" action="" id="myForm" enctype="multipart/form-data"> 
  <?php
  $row = mysqli_fetch_array($result);
  ?>
    <p><input type="text" name="cname" value="<?php echo $row["candidate_name"]; ?>"  placeholder="Enter your full name"></p>
    <p><input type="text" name="fname" value="<?php echo $row["father_name"]; ?>" placeholder="Enter your father's name"></p>
    
    <p>Date of birth:<input type="date" name="bdate" value="<?php echo $row["dob"]; ?>"placeholder ="Date of Birth"></p>
    <p><input type="email" name="email_id" value="<?php echo $row["email_id"]; ?>" placeholder ="Enter your mail id"></p>
    <p><input type="text" name="phno" value="<?php echo $row["phno"]; ?>" placeholder ="Enter your phone no"></p>
    <p><select name="qualification">
    <option> Select highest qualification</option>
    <?php
    $sql = "SELECT * FROM qualification_table";
    $retrive = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($retrive)){
    ?>
    <option value="<?php echo $rows["qualifications"];?>" <?php if($rows["qualifications"]==$row["qualifications"]){ ?>selected="selected"<?php } ?> > <?php echo $row["qualification"]; ?></option>
    <?php
    }
    ?>   
</select></p>
<p>(For the experience candidates only)</p>

<p><input type="text" name="yexp" value="<?php echo $row["yr_exp"]; ?>" placeholder="Years of experience"></p>
<p><input type='text' name="pre_comp" value="<?php echo $row["pre_comp"]; ?>" placeholder="Previous company"></p>

<p>Date of joining:<input type='date' name="doj" value="<?php echo $row["doj"]; ?>"></p>

<p>Date of Leaving:<input type='date' name="dol" value="<?php echo $row["dol"]; ?>"></p>
<p>Id proof :<input type="file" name="idProof" value="<?php echo $row["id_proof"]; ?>"/> </p>
<p>Address proof :<input type="file" name="addProof" value="<?php echo $row["add_proof"]; ?>"/></p>
<p>Upload cv :<input type="file" name='cvUpload' value="<?php echo $row["cv_upload"]; ?>"/> </p>
<p><input type="hidden" name="hide" value="1"></p>
<br>
<p class="submit"><input type="submit" name="commit" value="UPDATE"></p>
</form>
</div>  
</body>
</html>