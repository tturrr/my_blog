<?php
	session_start();
	include "dbConnect.php";
?>
<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>글 작성</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Electrical Service Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->

    <!-- //custom-theme -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <!-- //js -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- google fonts -->
  </head>

<script>
	function success(){
		var _submit = document.getElementById("membershipform");
		_submit.submit();
	}

	function submitBack(){
		location.href='about.php?<?php echo $_SESSION['testuser']?>';
	}



</script>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">    <?php if(isset($_SESSION['testuser'])){
	         echo $_SESSION['testuser'].'님의 블로그';
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

      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">

            </div>
          </div>
        </div>
      </div>


    <!-- Post Content -->
    <article >
      <div class="center-container">
    	<div class="banner-dott">
    		<div class="main" >
    				<div class="w3layouts_main_grid" style="Width: 80%">
    				<h1 class="w3layouts_head">글 작성</h1>
    					<form id="membershipform" align="left" action="http://13.125.107.155/about.php?<?php echo $_SESSION['testuser']?>" method="get">
                <div class="w3_agileits_main_grid w3l_main_grid">
                  <span class="agileits_grid">
                    <label>제목 <span class="star">*</span></label>
                    <input id="test"type="text" name="title" value="">
                  </span>
                </div>
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>내용<span class="star">*</span></label>
    									<div class="form-input add">
    										<span class="form-sub-label line1">
													<style>
														textarea.autosize { min-height: 50px; }
															</style>
    											<textarea name="contents"class="autosize"> </textarea>
    										</span>

    										<div class="clear"></div>
    									</div>
    									<div class="clear"></div>
    							</span>
    						</div>
								<input type="hidden" name="b_no"value="1" />
                </form>


    					<div class="w3_main_grid">
    						<div class="w3_main_grid_right">
									 <input id="btn"type="button" onclick="success()" value="작성완료"/>
                  <!-- <input type="button" onclick="submitForm()" value="첨부파일" > -->
                  <input type="button" onclick="submitBack()" value="되돌아가기">
    						</div>
    					</div>
    			</div>
    		</div>
    	</div>
    	</div>
    </article>

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
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script>
		$("textarea.autosize").on('keydown keyup', function () {
		  $(this).height(1).height( $(this).prop('scrollHeight')+12 );
		});
		</script>
    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <script>
    function logout(){
    location.href='login_action.php?logout=yes';
    }
    </script>
  </body>
</php>
