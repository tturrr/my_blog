<?php

	session_start();
 include "dbconnect.php";

     $nse_content = $dbConnect->escape_string($_POST['ir1']);
     $sql = "insert into nse_tb(content)";
     $sql .= " values ('{$nse_content}')";
     $res = $dbConnect->query($sql);

     if($res){
       ?>

   <?php  } else{
         echo "fail"; // 디비 입력 실패시 fail표시
     }
 ?>


<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
		<script>
		history.replaceState("object or string", "title", "about.php?<?php echo $_SESSION['testuser'];?>?<?php echo $_GET['b_no']; ?>");
		</script>
	</head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <?php if(isset($_SESSION['testuser'])){
						$con = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
						$_nickname = $_SESSION['testuser'];
						$sqlquery = "SELECT * FROM login WHERE nickname = '$_nickname'";
						$queryresult = mysqli_query($con, $sqlquery);
						$row = mysqli_fetch_array($queryresult);
						list($param1, $param2) = explode(':', $row['nickname']);
						echo $param2.'님의 블로그';
       }else { echo '블로그'; }?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">Sample Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            if(isset($_SESSION['testuser'])){

              echo  "<li class='nav-item'><a class='nav-link' onclick='logout();' href='#'>로그아웃</a></li> ";
            }else {
              echo "<li class='nav-item'><a class='nav-link' href='main.php'>로그인</a></li> ";
            }
              ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="height:50%; width:80%; margin-left: auto;margin-right: auto; background-image: url('img/about-bg.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->


    <div class="container">



      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
					<div class="clear">
						 <?php
            if(isset($_SESSION['testuser'])){?>
							<form method="post" action="http://13.125.107.155/write_board.php?<?php echo $_SESSION['testuser']?>">

								<input type="submit" value="글 작성하기" />
							</form>
							<?php
            }else {

            }
              ?>
        </div>
      </div>
    </div>

    <hr>

		<div>
			<?php
			$sql = "SELECT * FROM nse_tb ORDER BY no DESC LIMIT 3";
	 		$res = $dbConnect->query($sql);
	 		$showContent = $res->fetch_array(MYSQLI_ASSOC);
	 		echo $showContent['content'];
	 ?>

	 <video controls>
	 	<source src="video.mp4" type="video/mp4" />
	 </video>
		</div>

  <!-- 풋터 부분은 sns 로그인을위하여 나중에 구현을 위하여 일단은 뺴둔다.
		  <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <script>
    function logout(){
    location.href='login_action.php?logout=yes';
    }
    </script>
  </body>

</php>
