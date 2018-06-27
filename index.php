<?php

	session_start();
 include "dbConnect.php";
?>

<!DOCTYPE php>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>    <?php if(isset($_SESSION['testuser'])){
			$con = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
			$_nickname = $_SESSION['testuser'];
			$sqlquery = "SELECT * FROM login WHERE nickname = '$_nickname'";
			$queryresult = mysqli_query($con, $sqlquery);
			$row = mysqli_fetch_array($queryresult);
			list($param1, $param2) = explode(':', $row['nickname']);
			$param2.'님의 블로그';
		 }else { echo '블로그'; }?></title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <?php if(isset($_SESSION['testuser'])){
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
              <a class="nav-link" href="http://13.125.107.155/about.php?<?php echo $_SESSION['testuser']?>">블로그</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">벼룩시장</a>
            </li>
						<?php
							if(isset($_SESSION['testuser'])){
									echo  "<li class='nav-item'><a class='nav-link' href='http://13.125.107.155:3000/?id=$param2'>채팅</a></li> ";
										}else {
												echo "<li class='nav-item'><a class='nav-link' onclick='chatclick();' href='#'>채팅</a></li> ";
														}
						?>
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
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                Man must explore, and this is exploration at its greatest
              </h2>
              <h3 class="post-subtitle">
                Problems look mighty small from 150 miles up
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on September 24, 2018</p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
              </h2>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on September 18, 2018</p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                Science has not yet mastered prophecy
              </h2>
              <h3 class="post-subtitle">
                We predict too much for the next year and yet far too little for the next ten.
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2018</p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                Failure is not an option
              </h2>
              <h3 class="post-subtitle">
                Many say exploration is part of our destiny, but it’s actually our duty to future generations.
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              on July 8, 2018</p>
          </div>
          <hr>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>


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
		<script>
			function chatclick(){
				alert('로그인을 해야 채팅을 하실 수 있습니다.');
			}
		</script>
  </body>
</html>
