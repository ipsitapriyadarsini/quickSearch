<?php
include '../include/database.php';
include 'admin_dashboard.php';

if(isset($_GET['id'])){
$id=$_GET['id'];
$sqls=mysqli_query($conn,"DELETE FROM candidate_registration WHERE id='$id'");
header ('location:candidate_pagination.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="content_style.css">
  <title>All the candidate details which have registered</title>
</head>
<body>
<section id="main-content">
<section class="wrapper">
<div class="content-panel">
<?php 
$results_per_page = 5;      // Number of entries to show in a page.
$sql ="SELECT * FROM candidate_registration";  
$result = mysqli_query($conn,$sql);
$number_of_results = mysqli_num_rows($result);
$number_of_page = ceil ($number_of_results/$results_per_page);  
if (!isset($_GET["page"])) {     // Look for a GET variable page if not found default is 1.  
    $page = 1;    
}    
else { 
    $page = $_GET["page"]; 
}  
$this_page_first_result = ($page-1) * $results_per_page;
$sql = "SELECT * FROM candidate_registration LIMIT ". $this_page_first_result .','. $results_per_page;
$result = mysqli_query($conn, $sql);
//echo "</br>";
?>
<table  class="table table-striped table-condensed table-bordered customers-list" id="myTable">
<hr>
 <thead>
   <tr>
     <th>ID</th>
        <th>candidate name</th>
           <th>Father name</th>
            <th>Date of birth </th>
           <th>Email id</th>   
         <th>Phone no</th> 
      <th>Qualifications</th>
    <th>Year of experience</th>
    <th>Previous company</th>
  <th>Date of joining</th>
 <th>Date of leaving</th> 
 <th>Current Date</th> 
 <th>Modified Date</th> 
 <th>Update</th>   
 <th>Delete</th>   
 </tr>
</thead>
<tbody>
 <?php
 //echo $sql;die();
 $result = mysqli_query($conn,$sql); 
 while ($row = mysqli_fetch_array($result)) {   // Display each field of the records. 
  ?>
   <tr>     
   <td><?php echo $row["id"]; ?></td>     
   <td><?php echo $row["candidate_name"]; ?></td>   
   <td><?php echo $row["father_name"]; ?></td>     
   <td><?php echo $row["dob"]; ?></td>     
   <td><?php echo $row["email_id"]; ?></td>     
   <td><?php echo $row["phno"]; ?></td>     
   <td><?php echo $row["qualifications"]; ?></td>     
   <td><?php echo $row["yr_exp"]; ?></td>
   <td><?php echo $row["pre_comp"]; ?></td>     
   <td><?php echo $row["doj"]; ?></td>
   <td><?php echo $row["dol"]; ?></td>
   <td><?php echo $row["curent_date"]; ?></td>     
   <td><?php echo $row["modified_date"]; ?></td> 
   <td>
   <a href="http://localhost/quickSearch/users/candidate_registration_update.php?id=<?php echo $row['id']; ?>">                   
   <button class="btn btn-primary btn-xs"> Edit</button></a> 
   </td>
   <td>
   <a href="candidate_pagination.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure to delete this!'); return false">
   <button class="btn btn-danger btn-xs">Delete</button></a> </td>   
   </tr>     
   <?php     
     }  
   ?> 
   </tbody>
</table>
<?php
$number_of_pages = ceil($number_of_results/$results_per_page); 
     for($page=1;$page<=$number_of_pages;$page++){
       echo '<button class="btn btn-custom"><a href="candidate_pagination.php?page='. $page .'">'. $page .'</a></button>';
      }  
     ?>        
</div>
</section>
</section>
<script>
        (function(document) {
            'use strict';
            var TableFilter = (function(myArray) {
               var search_input;
                 function _onInputSearch(e) {
                    search_input = e.target;
                      var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                        myArray.forEach.call(tables, function(table) {
                          myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }
                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);
            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });
        })(document);
    </script>
</body>
</html>