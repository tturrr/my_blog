<?php
// 설정
include "dbconnect.php";
$uploads_dir = './uploads';
$allowed_ext = array('jpg','jpeg','png','gif','mp4');

// 변수 정리
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];
$ext = array_pop(explode('.', $name));

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
//
// 파일 정보 출력
// echo "<h2>파일 정보</h2>
// <ul>
// 	<li>파일명: $name</li>
// 	<li>확장자: $ext</li>
// 	<li>파일형식: {$_FILES['myfile']['type']}</li>
// 	<li>파일크기: {$_FILES['myfile']['size']} 바이트</li>
// </ul>";
?>
<!-- <script>
location.href='write_board.php';
</script> -->
<?php
 echo "confirm file information <br />";
 $uploadfile = $_FILES['upload'] ['name'];
 if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadfile)){
  echo "파일이 업로드 되었습니다.<br />";
  echo "<img src ={$_FILES['upload']['name']}> <p>";
  echo "1. file name : {$_FILES['upload']['name']}<br />";
  echo "2. file type : {$_FILES['upload']['type']}<br />";
  echo "3. file size : {$_FILES['upload']['size']} byte <br />";
  echo "4. temporary file name : {$_FILES['upload']['size']}<br />";
 } else {
  echo "파일 업로드 실패 !! 다시 시도해주세요.<br />";
 }
?>
