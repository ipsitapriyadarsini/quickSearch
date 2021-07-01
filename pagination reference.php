<?php
include '../include/database.php';
include 'admin_dashboard.php';
?>
<body>
<section id="main-content">
<section class="wrapper">
<div class="content-panel">
<?php 
$results_per_page = 2;      // Number of entries to show in a page.  
if (isset($_GET["page"])) {    
    $page = $_GET["page"];
 $start_from = ($page-1) * $results_per_page; 
 $sql ="SELECT * FROM company_registration where id > $start_from limit $results_per_page"; 
}    
else { 
  $sql ="SELECT * FROM company_registration limit $results_per_page";
}    

$sqls ="SELECT * FROM company_registration";
$result = mysqli_query($conn,$sqls);
// $total_records = $row[0];

$number_of_results = mysqli_num_rows($result);
echo "</br>";
?>
<table  class="table table-striped table-condensed table-bordered">
<hr>
 <thead>
   <tr>
     <th>ID</th>
        <th>Industry</th>
          <th>Company name</th>
           <th>Reg.no</th>
            <th>Company type</th>
           <th>Reg.date</th>   
         <th>Director</th> 
      <th>Head Office</th>
    <th>Company Address</th>   
 </tr>
</thead>
<tbody>
 <?php
 $results = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_array($results)) {    // Display each field of the records. 
  ?>
   <tr>     
   <td><?php echo $row["id"]; ?></td>     
   <td><?php echo $row["industry"]; ?></td>   
   <td><?php echo $row["company_name"]; ?></td>
   <td><?php echo $row["reg_no"]; ?></td>     
   <td><?php echo $row["company_type"]; ?></td>     
   <td><?php echo $row["reg_date"]; ?></td>     
   <td><?php echo $row["director"]; ?></td>     
   <td><?php echo $row["head_office"]; ?></td>     
   <td><?php echo $row["company_address"]; ?></td>     
   </tr>     
   <?php     
     }  
   ?> 
   </tbody>
</table>
<?php
     $number_of_pages = ceil($number_of_results/$results_per_page); 
     for($page=1;$page<=$number_of_pages;$page++){
       echo '<a href="company_pagination.php?page='. $page . '">' . $page .'</a>';
     }  
     ?>        
</div>
</section>
</section>
</body>