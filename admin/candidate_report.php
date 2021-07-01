<?php
include '../include/database.php';
include  'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="content_style.css">
  <link rel="stylesheet" href="report_style.css">
  <title>All the candidate details which have registered</title>
</head>
<body>
<section id="main-content">
<section class="wrapper">
<div class="content-panel">
<div class="filter">
<br><br><br><br>
<form action="" method="post" >
<input type="radio" name="dateby" class="date_by" value="">Date by
<input type="radio" name="dateby" class="qualification" value="">Qualification type<br>

 <span class="dateby">From date<input type="date" name ="fdate" id="addLiveOthers"></span>
 <span class="dateby">To date <input type = "date" name = "todate" id="addDate"></span>
 <select name="quali_tion" class="quali">
 <option value="">--Select Here--</option>
  <?php 
  $qry = mysqli_query($conn,"SELECT * fROM Qualification_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option value="<?php echo $rows["qualification"]; ?>"><?php echo $rows['qualification'] ?></option>
  <?php } ?>
    </select>
   
 <button type="submit" class="filters" name="filter">Filter</button>
 </form>
</div>
<?php 
$results_per_page = 5;      // Number of entries to show in a page.
$sql ="SELECT * FROM candidate_registration";  
$result = mysqli_query($conn,$sql);
$number_of_results = mysqli_num_rows($result);
$number_of_page = ceil ($number_of_results / $results_per_page);  
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
if(isset($_POST['filter'])){
  $fdate=$_POST['fdate'];
  $todate=$_POST['todate'];
  if(isset($fdate) && isset($todate) && $fdate !='' && $todate !=''){
    $sql="SELECT * FROM candidate_registration WHERE curent_date BETWEEN '$fdate' AND '$todate'  LIMIT ". $this_page_first_result .','. $results_per_page;
  }
  if(isset($_POST['quali_tion']) && $_POST['quali_tion'] != ''){
    $sql="SELECT * FROM candidate_registration WHERE qualification='$_POST[quali_tion]' LIMIT ". $this_page_first_result .','. $results_per_page;
  }
}
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
   </tr>     
   <?php     
     }  
   ?> 
   </tbody>
</table>

<?php
$number_of_pages = ceil($number_of_results/$results_per_page); 
     for($page=1;$page<=$number_of_pages;$page++){
       echo '<button class="btn btn-custom"><a href="report.php?page='. $page .'">'. $page .'</a></button>';
      }  
     ?>  
    <button class="print"> <a>Print</a></button>     
</div>
</section>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        $(document).ready(function(){
          $('.dateby').hide();
          $('.quali_tion').hide();
          $('.filters').hide();
          $(document).on('change','input[class="date_by"]',function(){
            $('.dateby').show();
			$('.filters').show();
			$('.quali_tion').hide();
		
          });
          $(document).on('change','input[class="industrytype"]',function(){
            $('.industry').show();
            $('.filters').show();
			$('.dateby').hide();
			$('.company').hide();
          });
          $(document).on('change','input[class="companytype"]',function(){
            $('.company').show();
            $('.filters').show();
			$('.dateby').hide();
          $('.industry').hide();
          });
        });
        
        <script src="jquery.min.js"></script>
    </script>
    <script>
        $('.print').click(function(){
            var printme = document.getElementById('myTable');
            var wme = window.open("","","width=900,height=700");
            wme.document.write(printme.outerHTML);
            wme.document.close();
            wme.focus();
            wme.print();
            wme.close();
        })
    </script>
    </script>
</body>