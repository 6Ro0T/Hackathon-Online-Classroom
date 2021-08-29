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
      <a href="dashboard.php" class="logo"><b>USER<span>NAME</span></b></a>
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
            <a class="active" href="dashboard.php">
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
              <li><a href="#">Assignments</a></li>
              <li><a href="#">Class test</a></li>
              <li><a href="#">Presentation</a></li>
              <li><a href="#">Small Quiz</a></li>
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
            <form action="#" method="get">
              <label class="text-right" >Choose Number of Questions:</label>
              <select id="numbers">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option selected>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              </select>
              <br><br>
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button type="button" class="btn btn-theme" onclick="getQuestion()">Set Quiz Area</button>
                </div>
                <div class="btn-group">
                  <button class="btn btn-theme04" onclick="clear()">Reset Quiz Area</button>
                </div>
              </div>  
              <br>
              <div id="questions"></div>
              <script type="text/javascript">
                function getQuestion(){
                  const select = document.getElementById('numbers');
                  var value = select.options[select.selectedIndex].value;
                  for(let i=1; i<=value; i++){
                    document.getElementById('questions').innerHTML+="</td></tr><tr><td valign=top><b>Question: "+i+"/"+value+"</b></td><td><input class='form-control' type='text' name='"+i+"question' placeholder='Enter question here' size=80><br><input class='form-control' type='text' name='"+i+"option1' placeholder='Option 1' size=70><br><input class='form-control' type='text' placeholder='Option 2' name='"+i+"option2' size='70'><br><input class='form-control' type='text' placeholder='Option 3' name='"+i+"option3' size=70><br><input class='form-control' type='text' placeholder='Option 4' name='"+i+"option4' size=70><br>Correct Answer: <input class='form-control' type='text' placeholder='Correct Option' name='"+i+"correct' size=70><br><br>";
                  }
                }

                function clear(){
                  document.getElementById('questions').innerHTML = "";
                }
              </script>
              <button type="button" class="btn btn-primary btn-lg btn-block">Generate Quiz</button>
            </form>
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

