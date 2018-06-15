<?php
    include "dbconnect.php"; // 데이터 베이스 접속 프로그램 불러오기
    $nse_content = $dbConnect->escape_string($_POST['ir1']);
    $sql = "insert into nse_tb(content)";
    $sql .= " values ('{$nse_content}')";
    $res = $dbConnect->query($sql);

    if($res){
      ?>
      
        <script>
            location.href='about.php';
        </script>


  <?php  } else{
        echo "fail"; // 디비 입력 실패시 fail표시
    }
?>
