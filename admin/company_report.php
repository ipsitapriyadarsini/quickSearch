<?php
include '../include/database.php';
include  'admin_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="content_style.css">
  <!-- <link rel="stylesheet" href="report_style.css"> -->
  <title>All the company details which have registered</title>
  <style>
    .print {
  float: right;
  margin-top: -10px;
}
a {
  text-decoration: none;
}
</style>
</head>
<body>
<section id="main-content">
<section class="wrapper">
<div class="content-panel">
<div class="filter">
<br><br><br><br>
<form action="" method="post" id="report-page-form-form" class="clearfix">
<input type="radio" name="dateby" class="date_by" value="">Date by
<input type="radio" name="dateby" class="industrytype" value="">Industry type
<input type="radio" name="dateby" class="companytype" value="">company type <br>
 <span class="dateby">From date<input type="date" name ="fdate" id="addLiveOthers"></span>
 <span class="dateby">To date <input type = "date" name = "todate" id="addDate"></span>
 <select name="industry" class="industry">
 <option value="">--Select Here--</option>
  <?php 
  $qry = mysqli_query($conn,"SELECT * fROM industry_table");
  while($rows=mysqli_fetch_array($qry)){
  ?>
    <option value="<?php echo $rows["industry_type"]; ?>"><?php echo $rows['industry_type'] ?></option>
  <?php } ?>
    </select>
    <select name="company" class="company">
	<option value="">--Select Here--</option>
	<?php 
	$qrys=mysqli_query($conn,"SELECT * FROM company_table");
	while($srow=mysqli_fetch_array($qrys)){
	?>
    <option value="<?php echo $srow["company_type"]; ?>"> <?php echo $srow['company_type'] ?></option>
	<?php } ?>
    </select>
 <button type="submit" class="filters" name="filter">Filter</button>
 <button type="submit" id="reset" name="clear" onclick="clearForm()">Reset</button>
 </form>
</div>
<?php 
$results_per_page = 5;      // Number of entries to show in a page.
$sql ="SELECT * FROM company_registration";  
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
$sql = "SELECT * FROM company_registration LIMIT ". $this_page_first_result .','. $results_per_page;
$result = mysqli_query($conn, $sql);
//echo "</br>";
if(isset($_POST['filter'])){
  $fdate=$_POST['fdate'];
  $todate=$_POST['todate'];
  if(isset($fdate) && isset($todate) && $fdate !='' && $todate !=''){
    $sql="SELECT * FROM company_registration WHERE curent_date BETWEEN '$fdate' AND '$todate'  LIMIT ". $this_page_first_result .','. $results_per_page;
  }
  if(isset($_POST['industry']) && $_POST['industry'] != ''){
    $sql="SELECT * FROM company_registration WHERE industry='$_POST[industry]' LIMIT ". $this_page_first_result .','. $results_per_page;
  }
  if(isset($_POST['company']) && $_POST['company'] != ''){
    $sql="SELECT * FROM company_registration WHERE company_type='$_POST[company]' LIMIT ". $this_page_first_result .','. $results_per_page;
  }
}
?>
<table  class="table table-striped table-condensed table-bordered customers-list" id="myTable">
   
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
  <th>Current date</th>
 <th>Modified date</th>     
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
   <td><?php echo $row["industry"]; ?></td>   
   <td><?php echo $row["company_name"]; ?></td>
   <td><?php echo $row["reg_no"]; ?></td>     
   <td><?php echo $row["company_type"]; ?></td>     
   <td><?php echo $row["reg_date"]; ?></td>     
   <td><?php echo $row["director"]; ?></td>     
   <td><?php echo $row["head_office"]; ?></td>     
   <td><?php echo $row["company_address"]; ?></td>
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
          $('.industry').hide();
          $('.company').hide();
          $('.filters').hide();
          $(document).on('change','input[class="date_by"]',function(){
            $('.dateby').show();
			$('.filters').show();
			$('.industry').hide();
			$('.company').hide();
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
  <script>
function clearForm() {
    document.getElementById("report-page-form-form").reset();
}
</script>
  
</body>
</html>