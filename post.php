<?php
	session_start();
	list($subString1,$id) = explode(":",$_SESSION['testuser']);

	$con1 = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
	$sql = 'SELECT * from shop order by b_no desc ';
	$result = mysqli_query($con1, $sql);
	$row = mysqli_fetch_assoc($result);
	/* 페이징 시작 */
		//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
			$bno = $row['b_no']-$page+1;
		} else {
			$page = 1;
				$bno = $row['b_no'];
		}
		//쿠키를 사용하여 조회수를 올리는 부분.
		if(!empty($page) && empty($_COOKIE['post_' . $bno])) {
			$sql = "UPDATE shop SET b_hit = b_hit + 1 where b_no =" .$bno;
			$result = mysqli_query($con1, $sql);
			if(empty($result)) {
				?>

				<?php
			} else {
				?>

			<?php
				setcookie('post_' . $bno, TRUE, time() + (12), '/');
			}
	}
		/* 검색 시작 */
			if(isset($_GET['searchColumn'])) {
				$searchColumn = $_GET['searchColumn'];
				$subString .= '&amp;searchColumn=' . $searchColumn;
			}
			if(isset($_GET['searchText'])) {
				$searchText = $_GET['searchText'];
				$subString .= '&amp;searchText=' . $searchText;
			}
			if(isset($searchColumn) && isset($searchText)) {
				$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
			} else {
				$searchSql = '';
			}
			/* 검색 끝 */
		// $sql = 'SELECT count(*) as cnt from board order by b_no desc';
		$sql = 'SELECT count(*) as cnt from shop' . $searchSql;
		$result = mysqli_query($con1, $sql);
		$row = mysqli_fetch_assoc($result);
			$allPost = $row['cnt']; //전체 게시글의 수
			if(empty($allPost)) {
					$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.
					<br />
					<a name="sub"   href="http://13.125.107.155/write_shop.php?">새로운 글쓰기</a></td></tr>';
				} else {
			$onePage = 1; // 한 페이지에 보여줄 게시글의 수.
			$allPage = ceil($allPost / $onePage); //전체 페이지의 수
			if($page < 1 || ($allPage && $page > $allPage)) {
  ?>
	<script>
			alert("존재하지 않는 페이지입니다.");
			history.back();
		</script>
<?php
		exit;
	}
	$oneSection = 5; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
	$currentSection = ceil($page / $oneSection); //현재 섹션
	$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
	if($currentSection == $allSection) {
		$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
	} else {
		$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
	}
	$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
	$paging = '<ul style="width:280px; margin:0 auto" class="list-inline text-center">'; // 페이징을 저장할 변수
	//첫 페이지가 아니라면 처음 버튼을 생성
	if($page != 1) {
		$paging .= '<li class="page page_start"><a class="pg_start" href="./post.php?page=1' . $subString . '">처음</a></li>';
	}
	//첫 섹션이 아니라면 이전 버튼을 생성
	if($currentSection != 1) {
	$paging .= '<li class="page page_prev"><a  class="pg_prev" href="./post.php?page=' . $prevPage . $subString . '">이전</a></li>';
	}
	for($i = $firstPage; $i <= $lastPage; $i++) {
		if($i == $page) {
			$paging .= '<li class="pg_current">' . $i . '</li>';
		} else {
			$paging .= '<li class="page"><a class="pg_page" href="./post.php?page=' . $i . $subString . '">' . $i . '</a></li>';
		}
	}
	//마지막 섹션이 아니라면 다음 버튼을 생성
	if($currentSection != $allSection) {
	  $paging .= '<li class="page page_next"><a class="pg_next" href="./post.php?page=' . $nextPage . $subString . '">다음</a></li>';
	}
	//마지막 페이지가 아니라면 끝 버튼을 생성
	if($page != $allPage) {
		$paging .= '<li class="page page_end"><a class="pg_end" href="./post.php?page=' . $allPage . $subString . '">끝</a></li>';
	}
	$paging .= '</ul>';
	/* 페이징 끝 */
	$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
	$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
 $sql = 'SELECT * from shop' . $searchSql . ' order by b_no desc' . $sqlLimit;//원하는 개수만큼 가져온다. (0번째부터 20번째까지
	$result = mysqli_query($con1, $sql);
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
		<link href="vendor\bootstrap\css\custompageing.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
		<script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>
		<script>
		var bDisplay = true;
function doDisplay(){
	var con = document.getElementById("myDIV");
	if(con.style.display=='none'){
			con.style.display = 'block';
	}else{
			con.style.display = 'none';
	}
}
		</script>
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
    <header class="masthead" style="height:50%; width:80%; margin-left: auto;margin-right: auto; background-image: url('img/post-bg.jpg');">
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
						<div style="margin-left:20%" class="searchBox">
			<form action="./post.php" method="get">
				<select  name="searchColumn">
					<option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
					<option <?php echo $searchColumn=='b_contents'?'selected="selected"':null?> value="b_contents">내용</option>
				</select>
				<input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
				<button type="submit">검색</button>
			</form>
		</div>
						<?php
					 if(isset($_SESSION['testuser'])){?>

							<!-- 검색할떄 쓰는 박스 div -->


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
	 //url에 아이디와 번호가 bid라는 걸로 한번에 들어온다.
	 // 	$bID = $_GET['bid'];
	 // //그래서  구분자로 나누어서 받는다.
	 // 	list($id, $bno) = explode('=', $bID);
	 //

	 // 	$sql = "SELECT b_title, b_contents, b_date, b_hit, nickname from board where b_no = ".$bno;
	 //   $queryresult = mysqli_query($con1, $sql);
	 // 	$row = mysqli_fetch_assoc($queryresult);

	 // $sql = 'SELECT * from board order by b_no desc';
	 //
	 // 						$result = mysqli_query($con1, $sql);

	 						if(isset($emptyData)) {
	 							echo $emptyData;
	 						} else {
	 						while($row = mysqli_fetch_assoc($result))

	 						{



	 ?>

	 <?php
	 if(isset($_SESSION['testuser'])){?>
		 <form name="myForm" style="margin-left:85%;" method="post" action="http://13.125.107.155/write_shop.php?<?php echo $_SESSION['testuser']?>">

			 <!-- <input name="sub" style="margin-left:100%;" type="submit" value="글 작성하기" /> -->
			 <a name="sub"   href="javascript:document.myForm.submit();">글쓰기</a>
			 <a href="./write_shop.php?bno=<?php echo $row['b_no'];?>">수정</a>
			 <a href="./write_delete_shop.php?bno=<?php echo $row['b_no'];?>">삭제</a>
		 </form>
		 <?php
	 }else {
	 }
		 ?>
	 <h3 id="boardTitle">제목:<?php echo $row['b_title']?>	 </h3>
	 <div id="boardInfo">
	 <span id="boardDate">작성일:<?php echo $row['b_date']?></span>
	 <span id="boardHit">조회수:<?php echo $row['b_hit']?></span>
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
<div>
						<?php echo $row['b_price']?>원

						<?php	if(isset($_SESSION['testuser'])){ ?>
						<h4> <a href='payment.php'>구매하기</a>
						 <a href='shoppingBasket.php'>장바구니</a></h4>
					 <?php }else{ ?>
						 <h4> <a href='#' onclick="chatclick();">구매하기</a>
							<a href='#' onclick="chatclick();" >장바구니</a></h4>
					<?php } ?>


<a style="margin-left:55%;" href="javascript:doDisplay();">>댓글</a><br/><br/>
</div>
<div style="display:none;" id="myDIV">

	<?php

		// $correct_m_page = $page -$page+1
		$sql = 'SELECT * from comment_free_shop where co_no=co_order and b_no=' . $bno;
		$result = mysqli_query($con1, $sql);
		// $ro = $row1 = mysqli_fetch_assoc($result);
 		// $s	=$ro['co_no'];

		?>
		<?php
			while($row = mysqli_fetch_assoc($result)){
		?>
		<ul class="oneDepth">
				<div style="border:1px solid; padding:10px;">

				 닉네임:<?php echo $row['co_nickname']?>
					<p><?php echo $row['co_content']?></p>
				</div>
		</ul>
	<?php }
 ?>
	<form action="comment_update_shop.php" method="post">
		<input type="hidden" name="page" value="<?php echo $bno?>">
		<input type="hidden" name="bno" value="<?php echo $page?>">
		<input type="hidden" name="conickname" value="<?php echo $id; ?>">
		<div class="btnSet">
			<?php if(isset($_SESSION['testuser'])){?>
					<table>
						<tbody>
							<tr>
								<th scope="row"><label for="coContent">내용</label></th>
								<td><textarea style="margin-left:20px;" cols="120" rows="5" name="coContent" id="coContent"></textarea></td>
							</tr>
						</tbody>
					</table>
							<input style="float:right" type="submit" value="댓글 작성">
		<?php	 }else{?>
			<hr />
		<a href="main.php">댓글을 작성하려면 로그인을 해주세요.</a><?php
		}
?>
		</div>
	</form>
</div>
		<hr style="margin-top:50px;"/>
	 <?php
	 }
		}
		?>
	</div>
<?php echo $paging ?>
<!--  풋터 부분은 sns 로그인을위하여 나중에 구현을 위하여 일단은 뺴둔다. -->
		 <!-- <footer>
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
				alert('로그인을 먼저 해주세요.');
				location.href='main.php'
			}
		</script>
  </body>

</php>
