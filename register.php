<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>회원가입</title>

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

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">myBlog</a>
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
            <li class="nav-item">
              <a class="nav-link" href="register.php">회원가입</a>
            </li>
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
    				<div class="w3layouts_main_grid" >
    				<h1 class="w3layouts_head">회원가입</h1>
    					<form action="#" method="post" class="w3_form_post">
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>이름 <span class="star">*</span></label>
    								<input type="text" name="Task"  required="">
    							</span>
    						</div>
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>닉네임 <span class="star">*</span></label>
    								<input type="text" name="Task"  required="">
    							</span>
    						</div>
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>이메일 <span class="star">*</span></label>
    								<input type="email" id="email" name="Task" required="">
    							</span>
    						 <button type="button" onclick="email_chk()">이메일 인증</button>
    						</div>
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>핸드폰 번호 <span class="star">*</span></label>
    								<input type="text" name="Task"  required="">
    							</span>
    						</div>
    						<div class="w3_agileits_main_grid w3l_main_grid">
    							<span class="agileits_grid">
    								<label>주소<span class="star">*</span></label>
    									<div class="form-input add">
    										<span class="form-sub-label line1">
    											<input type="text" id="first_address" name="street_address" placeholder="주소" required="" onclick="address()">

    										</span>
    										<span class="form-sub-label line2">
    											<input type="text"id="second_address" name="street_address2" placeholder="상세주소 " required="">
    										</span>
    										<div class="clear"></div>
    									</div>
    									<div class="clear"></div>
    							</span>
    						</div>



    					<div class="w3_main_grid">
    						<div class="w3_main_grid_right">
    							<input type="submit" value="가입 완료">
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    	</div>
    </article>

    <hr>

    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
    <script>
        //load함수를 이용하여 core스크립트의 로딩이 완료된 후, 우편번호 서비스를 실행합니다.
    		function address(){
        daum.postcode.load(function(){
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
                    // 예제를 참고하여 다양한 활용법을 확인해 보세요.
    								$("#first_address").val(data.address);
                }
            }).open();
        });
    	}
    </script>
    <script>
    function  email_chk(){
var email = $('#email').val();

var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
// 검증에 사용할 정규식 변수 regExp에 저장

if (email.match(regExp) != null) {
  alert("이메일이 발송되었습니다.");
  node node.js  
}
else {
        alert("이메일을 다시 입력해주세요.")
}



    }
    </script>





  </body>
</php>
