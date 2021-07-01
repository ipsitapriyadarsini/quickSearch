<?php
    include '../include/database.php';
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="style.css">
        <title>Admin dashboard</title>
    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-header">
                <h5 class="brand">
                    <span class="ti-ulink"></span>
                    <span>Quick Search</span>
                </h5>
                <span class="ti-menu-alt"></span>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#">
                        <span class="ti-home"></span>
                        <span>HOME</span>
                        </a>
                    </li>
                    <li>
                        <a href="add_user.php">
                        <span class="ti-agenda"></span>
                        <span>Add company/candidate</span>
                        </a>
                    </li>
                    <li>
                        <a href="company_pagination.php">
                        <span class="ti-bag"></span>
                        <span>List of company enrolled</span>
                        </a>
                    </li>
                    <li>
                        <a href="candidate_pagination.php">
                        <span class="ti-face-smile"></span>
                        <span>List of candidate enrolled</span>
                        </a>
                    </li>
                    <li>
                        <a href="#usersubmenu" data-toggle="collapse">
                        <span class="ti-import"></span>
                        <span>Master entery</span>
                        </a>
                        <ul class="collapse list-unstyled" id="usersubmenu">
							<li><a href="industries.php">industry type</a></li>
							<li><a href="companytype.php">company type</a></li>
							<li><a href="qualification.php">Qualification</a></li>								
						</ul>
                    </li>
                    <li>
                     <a href="#reportsubmenu" data-toggle="collapse">
						<span class="ti-printer"></span>
						<span>Reports<span>
                        </a>
						<ul class="collapse list-unstyled" id="reportsubmenu">
							<li><a href="#">Payment</a></li>
							<li><a href="#">Membership</a></li>
							<li><a href="#">Validity</a></li>								
						</ul>
					</li>
					<li>
                     <a href="#settingsubmenu" data-toggle="collapse">
						<span class="ti-settings"></span>
						<span>Settings<span>
                        </a>
						<ul class="collapse list-unstyled" id="settingsubmenu">
							<li><a href="#">Addusers</a></li>
							<li><a href="#">List of users</a></li>
							<li><a href="#">Change password</a></li>								
						</ul>
					</li>
           
            <li>
            <a href="../logout.php">
            <span class="ti-power-off"></span>
            <span>Log out</span>
            </a>
            </li>
            </ul>
</div>
        </div>
        </div>
 	<!-- <script type="text/javascript" language="javascript">
// 			$('.sub-menu ul').hide();
// $(".sub-menu a").click(function () {
// 	$(this).parent(".sub-menu").children("ul").slideToggle("100");
// 	$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
// });
		</script>
        <!------------------ Header------------------>
        <div class="header">
            <div class="box-container">
                <input type ="search" placeholder ="Search..." class="search search-input" data-table="customers-list">
                <a href="#"class ="ti-search"></a>
            </div>
            <a href="#" class="ti-filter"></a>    
        </div>
        </div>
        </div>
    </body>
</html>