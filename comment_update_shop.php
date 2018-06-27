<?php
 session_start();
 $con = mysqli_connect("localhost", "root", "a1214511", "joeltestdb");

	$page = $_POST['page'];
  $bNo = $_POST['bno'];
	$coId = $_POST['conickname'];
	$coContent = $_POST['coContent'];
  $sql= "INSERT INTO comment_free_shop (co_no, b_no, co_order, co_content, co_nickname) VALUES (null, '$page', null, '$coContent', '$coId')";
  $result = mysqli_query($con, $sql);

	$coNo = $con->insert_id;
	$sql = 'UPDATE comment_free_shop set co_order = co_no where co_no = ' . $coNo;
  $result = mysqli_query($con, $sql);
	if($result) {
?>
	<script>
		alert('댓글이 정상적으로 작성되었습니다.');
		location.replace("./post.php?page=<?php echo $bNo?>");
	</script>
<?php
	}
?>
