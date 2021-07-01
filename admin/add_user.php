<?php
include '../include/database.php';
include  'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adding user by admin</title>
  <style>
    .container{
        margin-left: 550px;
    }
    .btn a{
        text-decoration:none;
    }
    </style>
</head>
<body>
<div class="container">
  <div class="row" style="text-align:center; margin-top: 10em;">
    <div class="col-sm-2">
          <button type="button" class="btn btn-outline-info"><a href="../users/company_profile.php">Add company </a></button>
     </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-outline-info"><a href="../users/candidate_profile.php">Add candidate </a></button>
    </div>
</div>
</div>
</body>
</html>