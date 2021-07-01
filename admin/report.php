<?php
include '../include/database.php';
include 'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="content_style.css">
<link rel="stylesheet" href="report_style.css">
<style>
a {
  text-decoration: none;
}
 </style>
  <title>Report</title>
</head>
<body>
<div class="container">
  <div class="row" style="text-align:center; margin-top: 10em;">
    <div class="col-sm-2">
<button type="button" class="btn btn-outline-info"><a href="company_report.php">company report</a></button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-outline-info"><a href="candidate_report.php">candidate report</a></button>
</div>
</div>
</div>
</body>
</html>