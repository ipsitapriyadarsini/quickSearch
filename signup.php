<?php
include './include/database.php';

if (isset($_POST['commit'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $users = $_POST['users'];
    $hide = $_POST['hide'];
    $query = "SELECT * FROM user_login WHERE username ='$username'";
    $selectresult = mysqli_query($conn, $query);
    if (mysqli_num_rows($selectresult) > 0) {
        echo '<script>alert("Email id already exist!")</script>';
    } elseif ($password != $conpassword) {
        echo '<script>alert("passwords does not match")</script>';
    } else {
        $sql = "INSERT INTO user_login(username,pass_word,con_password,user_role,is_profile_update) VALUES ('$username','$password','$conpassword','$users','$hide')";
        $result = mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Signup</title>
</head>

<body>
<div class="login">
  <h1>SIGN UP FORM</h1>
  <form method="post" action="" id="myForm" onsubmit="return myValidation()">
    <p><input type="email" name="uname" placeholder="Username or Email" ></p>
    <p><input type="password" name="password" id="username" placeholder="Password" onkeyup="return test_str()"> <br/>
<span id="password_error" style="color:red"></span></p>
    <p><input type="password" name="conpassword" value="" placeholder="Confirm Password"></p>
    <p><select name="users" class="form-control" required>
    <option value="">select user type</option>
        <option value="company">company</option>
        <option value="candidate">candidate</option>
    </select></p>
    <input type="hidden" name="hide" value="0">
    <p class="submit"><input type="submit" name="commit" value="SUBMIT"></p>
    <div class="login-help">
  <p>Already have an account? <a href="login.php">Click here to login...</a></p>
</div>      
    </form>
  </div>
  <script type="text/javascript">
        function test_str()
{
   var res;
   var str = document.getElementById("username").value;
   if (str.match(/[a-z]/g) && str.match(/[A-Z]/g) && str.match(/[0-9]/g) && str.match(/[^a-zA-Z\d]/g) && str.length >= 8){                
document.getElementById("password_error").style.display="none";
return true;
}else {
document.getElementById("password_error").style.display="inline";
document.getElementById("password_error").style.color = "red";
document.getElementById("password_error").innerHTML = "Password Strength Is Low";
return false;
}
}
function myValidation()
{
var res;
var str = document.getElementById("username").value;
if(!(str.match(/[a-z]/g) && str.match(/[A-Z]/g) && str.match(/[0-9]/g) && str.match(/[^a-zA-Z\d]/g) && str.length >= 8))
{
//alert("validation failed false");
return false;
}else{
return true;
}
}
</script>
</body>
</html>