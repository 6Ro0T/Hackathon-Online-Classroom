<?php
include('session.php');
include('../conn.php');

$sql="select * from student where email='$user_check' and division='$user_role'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<?php
if(isset($_POST['submit'])){
	
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Teacher's Dashboard</title>

  <!-- Favicons -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  <style type="text/css">
    /*adding style to quiz buttons*/
    #quiz{
      background-color: lightblue;
      border-radius: 5px;
      border: 1px solid red;
      padding: 10px;
      font-size: 20px;
    }
    #quiz:hover{
      cursor: pointer;
      background-color: blue;
      border: 1px solid orange;
    }
  </style>
</head>

<body>
  <section id="container">
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <!-- <div class="fa fa-bars " data-placement="right" data-original-title="Toggle Navigation"></div> -->
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b><?php echo $row['name'];?></span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li style="margin-top: 20px; margin-right: 20px;"><span id="date-time" style="color: white; "></span></li>
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="../img/ui-sam.jpg" class="img-circle" width="80"></p>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Task</span>
              </a>
            <ul class="sub">
              <li><a href="assignment.php">Assignments</a></li>
              <li><a href="quiz.php">Small Quiz</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
              </a>
            <ul class="sub">
              <li><a href="#">Schedules</a></li>
              <li><a href="#">Syllabus Calendar</a></li>
              <li><a href="#">Class Time Table</a></li>
              <li><a href="#">Holidays</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-video-camera"></i>
              <span>Meet</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-book"></i>
              <span>Notes</span>
              </a>
            <ul class="sub">
              <li><a href="#">Textbooks</a></li>
              <li><a href="#">Teacher Notes</a></li>
              <li><a href="#">Student's Written Notes</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="#">Lobby</a></li>
              <li><a href="#"> Chat Room</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
   
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <h1>ASSIGNMENTS</h1>
            <form action="asg_sample.php" method="post">
			
              <label class="text-right" name="numb" >Choose Number of Questions:</label>
             <select name="number"  required>
                <option >Select</option>
                <option value="1" >1</option>
                <option value="2">2</option>
				<option value="3" >3</option>
                <option value="4">4</option>
				<option value="5" >5</option>
                <option value="6">6</option>
				<option value="7" >7</option>
                <option value="8">8</option>
				<option value="9" >9</option>
                <option value="10">10</option>
                
               </select> 
              <br><br>
			  <button type="submit">Question</button>
			  </form>
			  <form method="Post" action="asg_sample.php">
              <?php
              if(isset($_POST['assignment'])){
              $name=$_POST['assignment'];
			  echo $name;
			  }
			  ?>
			  <?php
			  if(isset($_POST['number'])){
				  $num=$_POST['number'];
				  
				  
				  for($i=1;$i<=$num;$i++){
				?>
				<b value='questionnum[<?php echo $i;?>]'>Question:<?php echo $i;?></b>
				<input class='form-control' type='text' name="question[<?php echo $i;?>]" placeholder='Enter question here' size=80><br>
				<?php
					
				  }
			  }
			  
			  ?>
               
              <br>
              <div id="questions"></div>
            
             
           
              <div class="col-md-6 offset 4">
               
                <label>Select the Due Date: <input class="form-control" type="date" name="datetime"/></label>
              </div>
              <button type="submit" name="submit"class="btn btn-primary btn-lg btn-block">Post Assignment Questions</button>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h4 class="title">Displaying scheduled Assignment here</h4>
            <!-- <div class="alert alert-info"><b>Heads up!</b> This alert needs your attention, but it's not super important.</div> -->
            <div class="steps pn">
                  <label for="op1">Assignment Subject Name: [dummy]</label>
                  <label for="op2">For Section: [dummy]</label>
                  <label for="op3">Number of Questions: [dummy]</label>
                  <label for="op4">Assignment Due Date: [dummy]</label>
            </div>
          </div>
        <!--/ row -->
      </section>
      
    </section>
    
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>


