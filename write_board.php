<?php
	session_start();


	//$_GET['bno']이 있을 때만 $bno 선언
	// url에 아이디와 번호가 bid라는 걸로 한번에 들어온다.
  	$bID = $_GET['bid'];
  //그래서  구분자로 나누어서 받는다.


		if(isset($_GET['bno'])) {
			$bno = $_GET['bno'];

		}
		if(isset($bno)) {

		 	$con = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
		 	$sql = "SELECT b_title, b_contents, nickname from board where b_no = ". $bno;
		 					$result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
			}
?>
<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<script type="text/javascript" src="./nse_files/js/HuskyEZCreator.js" charset="utf-8"></script>
		<style>
		.nse_content{width:1000px;height:500px}

		</style>
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
    				<div class="w3layouts_main_grid" style="Width: 70%">
    				<h1 class="w3layouts_head">글 작성</h1>
						<form enctype="multipart/form-data" name="nse" action="<?php echo isset($bno)?'write_modify.php':'write_update.php'?>			" method="post">
							<?php
								if(isset($bno)) {?>
								<input type="hidden" name="bno" value= "<?php echo $bno?>" />
								<?php $url_page = $_GET['page']; ?>
								<input type="hidden" name="url_page" value="<?php echo $url_page?>" />
								<?php }
							?>
								<input type="text" name="b_title" placeholder="제목" value="<?php echo isset($row['b_title'])?$row['b_title']:null?>" />
								<textarea name="ir1" id="ir1" class="nse_content" ><?php echo isset($row['b_contents'])?$row['b_contents']:null?> </textarea>
								<script type="text/javascript">
								var oEditors = [];
								nhn.husky.EZCreator.createInIFrame({
										oAppRef: oEditors,
										elPlaceHolder: "ir1",
										sSkinURI: "./nse_files/SmartEditor2Skin.html",
										fCreator: "createSEditor2"
								});
								function submitContents(elClickedObj) {
										// 에디터의 내용이 textarea에 적용됩니다.
										oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
										// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
										try {
												elClickedObj.form.submit();
										} catch(e) {}
										}
								</script>
								<!-- <form enctype='multipart/form-data' action='upload_ok.php' method='post'> -->
										<p>이미지<input type='file'id="b_image" name='b_image'/>동영상<input type='file'id="video" name='video'/></p>
								<div >
									<input  type="submit" value="<?php echo isset($bno)?'수정하기':'작성하기'?>" onclick="submitContents(this)" />
									<input  type="button" onclick="submitBack()" value="되돌아가기">
								</div>
						 <!-- </form> -->
						</form>
    					<div class="w3_main_grid">
    						<div class="w3_main_grid_right">
                  <!-- <input type="button" onclick="submitForm()" value="첨부파일" > -->
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
