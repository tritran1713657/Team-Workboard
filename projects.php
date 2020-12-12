<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "workboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function insertProject()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workboard";
    $conn = new mysqli($servername, $username, $password, $dbname);

   // Create connection
   // Check connection
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }
   $sql = "INSERT INTO project (project_id, project_name, project_owner, start_date, end_date)  VALUES ('".$_POST["pname"]."', '".$_POST["owner"]."', '".$_POST["sdate"]."', '".$_POST["edate"]."', 0);";
   $result = $conn->query($sql);

} 

$conn->close();
?>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- MODAL STYLING-->
     <link href="assets/css/modal_style.css" rel="stylesheet" />
          <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
				</li>			
                    <li>
                        <a  href="index.html"><i class="fal fa-home-lg-alt"></i> Overview</a>
                    </li>
                    <li>
                        <a class="active-menu"  href=""><i class="fad fa-tasks"></i> Projects</a>
                    </li>
                    <li>
                        <a  href="account.html"><i class="far fa-user"></i> Account</a>
                    </li>
                    <br>
                    <li>
                        <a  href=""><i class="fas fa-cogs"></i> Settings</a>
                    </li>
                    <li>
                        <a  href="sign-in.html"><i class="fas fa-sign-out-alt"></i> Sign out</a>
                    </li>
                </ul>
               
            </div>
        </nav>  

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">            
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div>                  
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-8">
                     	<h4>All projects</h4>
                    </div>
                    <div class="col-md-4 blue-text">
                     	<h4><a id="new_project" href =#><i class="far fa-plus-hexagon"></i> Create New Project</a></h4>
                    </div>
                    <form action='projects.php' method='post' id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                          <div class="modal-header">
                            <span class="close">&times;</span>
                            <h2 id="newproject_label">NEW PROJECT</h2>
                          </div>
                          <div class="modal-body">
                            <h3>PROJECT NAME</h3>
                            <input class="modal_input_text" type="text" name='pname' placeholder ="Name of project...">
                            <h3>PROJECT OWNER</h3>
                            <input class="modal_input_text" type="text" name='owner' placeholder = "Owner...">
                            <h3>START DATE</h3>
                            <input class="modal_input_text" type="date" name='sdate' placeholder = "Start date...">
                            <h3>END DATE</h3>
                            <input class="modal_input_text" type="date" name='edate'placeholder = "End date...">
                          </div>
                          <div class="modal-footer">
                              <input  name='submit' type='button' value='submit'/>
                          </div>
                        </div>
                      
</form>
                </div>                
                <!-- /. ROW  -->
                <div class="row header-row">
                    <div class="col-md-4">
                     	<h4>Project Name</h4>
                    </div>
                    <div class="col-md-2">
                     	<h4>Type</h4>
                    </div>
                    <div class="col-md-2">
                     	<h4>Start date</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>End date</h4>
                    </div>
                    <div class="col-md-2">
                     	<h4>State</h4>
                    </div>
                </div> 
                <?php
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT project_id, project_name, project_owner, start_date, end_date, state FROM project";
                    $result = $conn->query($sql);

                    while($row= mysqli_fetch_array($result))
                    {
                ?>
                 <!-- /. ROW  -->
                <div class="row detail-row">
                    <div class="col-md-4">
                     	<h4><a href="tasks-list.html"><?php echo $row['project_name']; ?></a></h4>
                    </div>
                    <div class="col-md-2">
                     	<h4><?php echo $row['project_owner']; ?></h4>
                    </div>
                    <div class="col-md-2">
                     	<h4><?php echo $row['start_date']; ?></h4>
                    </div>
                    <div class="col-md-2">
                        <h4><?php echo $row['end_date']; ?></h4>
                    </div>
                    <div class="col-md-2">
                         <button class="btn btn-primary" onclick = "dropFunction()"><?php echo $row['state']==0 ?  'In progress' : 'Done'; ?></button>
                         <div id="myDropdown" class="dropdown-content">
                            <a href="#">In Progress</a>
                            <a href="#">Done</a>
                         </div>
                    </div>
                </div> 
                <?php
            }
            ?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("new_project");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        var state_btn = document.getElementById("btn btn-primary")
        function dropFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }

    </script>
   
</body>
</html>
