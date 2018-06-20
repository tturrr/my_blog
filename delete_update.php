<?php
session_start();
 include "dbconnect.php";

 //$_POST['bno']이 있을 때만 $bno 선언

 if(isset($_POST['bno'])) {

   $bNo = $_POST['bno'];

 }

if(isset($bNo)) {

   	$sql = 'SELECT count(b_title) as cnt from board where b_no = ' . $bNo;

   	$result = $dbConnect->query($sql);

   	$row = $result->fetch_assoc();

    if($row['cnt']) {

    		$sql = 'DELETE from board where b_no = ' . $bNo;

    		$msgState = '삭제';

    	//틀리다면 메시지 출력 후 이전화면으로

    	}
    }
    $result = $dbConnect->query($sql);
    if($result) {

    	$msg = '정상적으로 글이 삭제되었습니다.';

    	$replaceURL = './about.php';
    }
    ?>

    <script>

    	alert("<?php echo $msg?>");

    	location.replace("<?php echo $replaceURL?>");

    </script>
