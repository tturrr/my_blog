<?php
	session_start();
	$id = $_SESSION['testuser'];
?>
<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>구매내역</title>

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
		<style>
		.title h2,
	 .title h2 {
		 display: inline;
	 	}
		.contents h3,
	 	.contents span,
		.contents img{
			display: inline;
		}
		.box3 {
    height: 80px;
    background: skyblue;
    text-align:center;
  }
  .middle {
    display: flex;
    align-items: center;
    justify-content: center;
  }
		</style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">구매내역</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.php">블로그</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">벼룩시장</a>
            </li>
						<?php
						  if(isset($_SESSION['testuser'])){
								  echo  "<li class='nav-item'><a class='nav-link' href='http://13.125.107.155:3000/'>채팅</a></li> ";
									  }else {
											  echo "<li class='nav-item'><a class='nav-link' onclick='chatclick();' href='#'>채팅</a></li> ";
												    }
						?>
						<li class="nav-item">
							<a class="nav-link" href="PurchaseHistory.php">구매 내역</a>
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
    				<div class="w3layouts_main_grid" style="width:100%" >
    				<h1 class="w3layouts_head">구매내역</h1>
							<div class="title">
								<?php
								$con1 = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
								$sql = "SELECT b_image, b_price, b_date, b_title FROM PurchaseId WHERE nickname ='{$id}'";
								$result = mysqli_query($con1, $sql);
									?>

								<table border="10" style="width:100%">
									<tr>
										<th>상품이미지</th>
										<th style="padding-left:20%">상품명</th>
										<th style="padding-left:15%">상품가격</th>
										<th style="padding-left:20%">결제일</th>
									</tr>
									<?php
									while($row = mysqli_fetch_assoc($result)) {
									?>
									<tr>
										<td  style="width:10%; height:10%;">	<?php if($row['b_image'] == "./"){ ?>
														<img  src="noimage.png"/>
										<?php	} else { ?>
													<img   src="<?php echo $row['b_image'];?>"/>
									<?php	} ?></td>
										<td style="padding-left:20%">		<span><?php echo $row['b_title'];?>	 </span></td>
										<td style="padding-left:15%">	<span ><?php echo $row['b_price'];?> 원</span></td>
										<td style="padding-left:20%">	<span ><?php echo $row['b_date'];?></span></td>
									</tr>
								<?php			}
								?>
								</table>
									<!-- <h2 style="color: #000;">상품이미지</h2>
											<h2 style="color: #000; margin-left:20%;">상품명</h2>
												<h2 style="color: #000; margin-left:19.5%;">상품가격</h2>
													<h2 style="color: #000; margin-left:16%;">결제일</h2> -->
							</div>





    						</div>
          </div>
    		</div>
    	</div>
    </article>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
    <script>
		function logout(){
		location.href='login_action.php?logout=yes';
		}
		</script>
		<script>
			function chatclick(){
				alert('로그인을 해야 채팅을 하실 수 있습니다.');
			}
			$(window).on('load', function () {
	    load('#js-load', '1');
	    $("#js-btn-wrap .button").on("click", function () {
	        load('#js-load', '1', '#js-btn-wrap');
	    })
	});

	function load(id, cnt, btn) {
    var girls_list = id + " .js-load:not(.active)";
    var girls_length = $(girls_list).length;
    var girls_total_cnt;
    if (cnt < girls_length) {
        girls_total_cnt = cnt;
    } else {
        girls_total_cnt = girls_length;
        $(button).hide();
    }
    $(girls_list + ":lt(" + girls_total_cnt + ")").addClass("active");
}
		</script>




  </body>
</php>
