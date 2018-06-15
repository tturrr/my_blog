<?php
    include "dbconnect.php";
    $sql = "SELECT * FROM nse_tb ORDER BY no DESC LIMIT 1";
    $res = $connect->query($sql);
    $showContent = $res->fetch_array(MYSQLI_ASSOC);
    echo $showContent['content'];
?>
