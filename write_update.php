<?php
  session_start();
	require_once("dbconnect.php");

  $uploads_dir = './uploads';
  $allowed_ext = array('jpg','jpeg','png','gif','mp4');

  // 변수 정리
  $error = $_FILES['myfile']['error'];
  $name = $_FILES['myfile']['name'];
  $ext = array_pop(explode('.', $name));

  $source = $_FILES['b_image']['tmp_name'];
  $dest = "./".basename($_FILES['b_image']['name']);
  move_uploaded_file($source,$dest);

  // 오류 확인
  if( $error != UPLOAD_ERR_OK ) {
  	switch( $error ) {
  		case UPLOAD_ERR_INI_SIZE:
  		case UPLOAD_ERR_FORM_SIZE:
  			echo "파일이 너무 큽니다. ($error)";
  			break;
  		case UPLOAD_ERR_NO_FILE:
  			echo "파일이 첨부되지 않았습니다. ($error)";
  			break;
  		default:
  			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
  	}
  	exit;
  }

  // 확장자 확인
  if( !in_array($ext, $allowed_ext) ) {
  	echo "허용되지 않는 확장자입니다.";
  	exit;
  }

  // 파일 이동
  move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");


  $_nickname = $_SESSION['testuser'];

	$bID = $_nickname;

	$bTitle = $_POST['b_title'];

	$bContent = $_POST['ir1'];

  $bImage = $_POST['b_image'];

	$date = date('Y-m-d H:i:s');

  $sql = 'insert into board(b_no, b_title, b_content, b_date, b_hit, b_image, nickname)
  values(null, "' . $bTitle . '", "' . $bContent . '", "' . $date . '", 0, "' . $bID . '","' . $bID'"))';
  //
	// $result = $db->query($sql);
  //
	// if($result) { // query가 정상실행 되었다면,
  //
	// 	$msg = "정상적으로 글이 등록되었습니다.";
  //
	// 	$bNo = $db->insert_id;
  //
	// 	$replaceURL = './view.php?bno=' . $bNo;
  //
	// }
  // else {
  //
	// 	$msg = "글을 등록하지 못했습니다.";

?>

		<script>

			alert("<?php echo $msg?>");

			history.back();

		</script>

<?php

	// }



?>

<script>

	alert("<?php echo $msg?>");

	location.replace("<?php echo $replaceURL?>");

</script>
