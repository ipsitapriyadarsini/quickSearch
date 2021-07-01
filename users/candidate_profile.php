<?php
include '../include/database.php';
session_start();
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
    $path = 'upload/' . $_FILES['idProof']['name'];
    move_uploaded_file($_FILES['idProof']['tmp_name'], $path);
    $path1 = 'upload/' . $_FILES['addProof']['name'];
    move_uploaded_file($_FILES['addProof']['tmp_name'], $path1);
    $path2 = 'upload/' . $_FILES['cvUpload']['name'];
    move_uploaded_file($_FILES['cvUpload']['tmp_name'], $path2);

    $sql = "INSERT INTO candidate_registration (username,candidate_name,father_name,dob,email_id,phno,qualifications,yr_exp,pre_comp,doj,dol,id_proof,add_proof,cv_upload,curent_date) VALUES ('$user','$cname','$fname','$bdate','$email','$phno','$quali','$yexp','$pre_comp','$doj','$dol','$path','$path1','$path2',Now())";

    $result = mysqli_query($conn, $sql);
    $retrive = mysqli_query($conn,"SELECT username,is_profile_update FROM user_login WHERE username='$user'");
    $rows = mysqli_fetch_array($retrive);
    $hide = $_POST['hide'];
    $uname = $rows['username'];
    $update = mysqli_query($conn,"UPDATE user_login SET is_profile_update ='$hide' WHERE username='$uname'");
    header('location:candidate_dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile2_style.css">
    <title>Candidate Profile Registration</title>
</head>
<body>
<div class="profile">
  <h1>PROFILE REGISTRATION FORM</h1>
  <form method="post" action="" id="myForm" enctype="multipart/form-data"> 
  
    <div><input type="text" name="cname"  placeholder="Enter your full name"></div><br>
    
    <div><input type="text" name="fname"  placeholder="Enter your father's name"></div><br>
    
    <div>Date of birth:<input type="date" name="bdate" placeholder ="Date of Birth"></div><br>
    <div><input type="email" name="email_id" placeholder ="Enter your mail id"></div><br>
    <div><input type="text" name="phno" placeholder ="Enter your phone no"></div><br>
    
    <div>Educational qualification:</div>
    <br>

    <div class="container" id="contain">
    
    <p><select name="qualification">
    <option value=""> Select Educational qualification</option>
    <?php 
  $qry = mysqli_query($conn,"SELECT * fROM qualification_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option value="<?php echo $rows["qualification"]; ?>"><?php echo $rows["qualification"]; ?></option>
    
    <?php
    }
    ?>
</select></p><br>
<div><input type="text" class="education" placeholder="Name of the University/Board"></div><br>
<div><input type="text" class="percentage" placeholder="Mark secured in last examination">% (Enter only number)</div><br>
 
</div>
    
<div><a href="#" id="addField" style="text-decoration:none;">ADD+</a></div>
<div><a href="#" class="remove_field" style="text-decoration:none;">Remove--</a></div>
<br>
<br>
<div>(For the experience candidates only)</div>
<br>
<br>
<p><input type="text" name="yexp" placeholder="Years of experience"></p>
<p><input type='text' name="pre_comp" placeholder="Previous company"></p>

<p>Date of joining :<input type='date' name="doj"></p>

<p>Date of Leaving :<input type='date' name="dol"></p>
<p>Id proof :<input type="file" name="idProof"/> </p>
<p>Address proof :<input type="file" name="addProof"/></p>
<p>Upload cv :<input type="file" name='cvUpload'/> </p>
<p><input type="hidden" name="hide" value="1"></p>
<br>
<p class="submit"><input type="submit" name="commit" value="SUBMIT"></p>
</form>
</div>  
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// $(document).ready(function(){
//  $('#addField').click(function(){
  // $('#contain').append( '<div class="container" id="contain"><p><select name="qualification"><option value=""> Select Educational qualification</option><?php $qry = mysqli_query($conn,"SELECT * fROM qualification_table");
  // while($rows=mysqli_fetch_array($qry)){
  ?>
    // <option value="< echo $rows["qualification"]; ?>">< echo $rows["qualification"]; ?></option><?php
    // }
    // ?>
// </select></p><br><div><input type="text" class="education" placeholder="Name of the University/Board"></div><br><div><input type="text" class="percentage" placeholder="Mark secured in last examination">% (Enter only number)</div><br></div>');
//  });
// });
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $("#contain"); //Fields wrapper
	var add_field     = $("#addField"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_field).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div class="container" id="contain"><p><select name="qualification"><option value=""> Select Educational qualification</option><?php $qry = mysqli_query($conn,"SELECT * fROM qualification_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option value="<?php echo $rows["qualification"]; ?>"><?php echo $rows["qualification"]; ?></option><?php }
     ?>
 </select></p><br><div><input type="text" class="education" placeholder="Name of the University/Board"></div><br><div><input type="text" class="percentage" placeholder="Mark secured in last examination">% (Enter only number)</div><br></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); 
    $(this).parent('div').remove();
     x--;  //text box removed
	})
});
</script>
</html>