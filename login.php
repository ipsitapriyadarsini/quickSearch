<?php
include './include/database.php';
session_start();
if (isset($_POST['commit'])) {
    $uname = $_POST['login'];
    $password = $_POST['password'];
    //$user_role = $_POST['user_role'];
    $result = mysqli_query(
        $conn,
        "SELECT username, pass_word,user_role,is_profile_update FROM user_login WHERE username ='$uname'and pass_word ='$password'"
    );

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_role'] = $row['user_role'];
        $_SESSION['is_profile'] = $row['is_profile_update'];
        if ($row['user_role'] == 'Admin') {
            header('location:admin/admin_dashboard.php');
        } elseif ($row['user_role'] == 'company') {
            if ($row['is_profile_update'] == '0') {
                header('location:users/company_profile.php');
            } else {
                header('location:users/company_dashboard.php');
            }
        } elseif ($row['user_role'] == 'candidate') {
            if ($row['is_profile_update'] == '0') {
                header('location:users/candidate_profile.php');
            } else {
                header('location:users/candidate_dashboard.php');
            }
        } else {
            header('location:login.php');
        }
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
  <title>Login</title>
</head>
<body>
<div class="login">
  <h1>Login page</h1>
  <form method="post" action="">
    <p><input type="email" name="login" value="" placeholder="Username or Email"></p>
    <p><input type="password" name="password" value="" placeholder="Password"></p>
    <p class="remember_me">
      <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label>
    </p>
    <p class="submit"><a href=""><input type="submit" name="commit" value="Login"></a></p>
<div class="login-help">
  <p>Forgot your password? <a href="#">Click here to reset it.</a></p></div>
  <div class="login-help">
  <p>Don't have an account? <a href="signup.php">Click here to register.</a></p>
</div>
</form>
</div>
</body>
</html>