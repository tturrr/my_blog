<?php

	session_start();


	$con1 = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");

		$bID = $_GET['bid'];
	//그래서  구분자로 나누어서 받는다.
		list($id, $bNo) = explode('=', $bID);

	$sql = 'SELECT b_title, b_contents, b_date, b_hit, nickname, b_image ,video from board where b_no = ' . $bNo;

	$result = mysqli_query($con1, $sql);

	$row = mysqli_fetch_assoc($result)



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
	</head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <?php if(isset($_SESSION['testuser'])){
						list($param1, $param2) = explode(':', $_SESSION['testuser']);
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
              <a class="nav-link" href="about.php">블로그</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">벼룩시장</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://13.125.107.155:3000/">Contact</a>
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


						 <?php
            if(isset($_SESSION['testuser'])){?>
							<form name="myForm" style="margin-left:80%;" method="post" action="http://13.125.107.155/write_board.php?<?php echo $_SESSION['testuser']?>">

								<!-- <input name="sub" style="margin-left:100%;" type="submit" value="글 작성하기" /> -->
								<a name="sub"   href="javascript:document.myForm.submit();">추가</a>
							  <a href="./write_board.php?bno=<?php echo $bNo?>">수정</a>
								<a href="./write_delete.php?bno=<?php echo $bNo?>">삭제</a>
								<a href="./about.php">목록</a>
							</form>
							<?php
            }else {

            }
              ?>

    </div>

    <hr>

		<div>






	 <h3 id="boardTitle">제목: <?php echo $row['b_title']?></h3>

	 <div id="boardInfo">

	 <span id="boardDate">작성일: <?php echo $row['b_date']?></span>

	 <span id="boardHit">조회수: <?php echo $row['b_hit']?></span>

	 </div>

	 <div id="boardContent"><?php echo $row['b_contents']?></div>


	 <?php
$str = "./";
	 $img = $row['b_image'];
	 if($img == $str){

	 }else if($img != $str){?>
	 <img  src="<?php echo $row['b_image'] ?>"/>
 <?php	}
 ?>
 <?php

 $video = $row['video'];
 if($video == $str){

 }else if($video != $str){?>
	 <video style="height:30%; Width:30%;" controls >
		<source  src="<?php echo $row['video']?>" type="video/mp4" />
	 </video>
<?php	}
?>

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
