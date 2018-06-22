<?php
  session_start();
	require_once("dbconnect.php");

          $source = $_FILES['b_image']['tmp_name'];
          $dest = "./".basename($_FILES['b_image']['name']);
          move_uploaded_file($source,$dest);
            $source_video = $_FILES['video']['tmp_name'];
            $dest_video = "./".basename($_FILES['video']['name']);
            move_uploaded_file($source_video,$dest_video);

  $url_page  = $_POST['url_page'];
  $_nickname = $_SESSION['testuser'];
	$bID = $_nickname;
	$bTitle = $_POST['b_title'];
	$bContent = $_POST['ir1'];
  $bImage = $dest;
	$date = date('Y-m-d H:i:s');
	$bNo = $_POST['bno'];
  $video = $dest_video;
	$con = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
  $sql = 'UPDATE board set b_title="' . $bTitle . '", b_contents="' . $bContent . '", b_image="' . $bImage .'", video = "' . $video .'" where b_no = ' . $bNo;
  $queryresult = mysqli_query($con, $sql);
	if($queryresult) { // query가 정상실행 되었다면,
		$msg = "정상적으로 글이 등록되었습니다.";
	$replaceURL = './about.php?bid='. $bID .'?bno='. $bNo;
	}
  else {
		$msg = "글을 등록하지 못했습니다.";
?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
<?php
	}
?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
