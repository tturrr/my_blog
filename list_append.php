<?php
$con1 = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");

  $start = $_POST['start'];
  $list = $_POST['list'];

  $q = mq("SELECT * FROM PurchaseId WHERE no > 0 order by no desc limit {$start}, {$list}" );
  while ($d = mfa($q)){
?>
    <tr>
    <td><?php echo $d['no']; ?></td>
    </tr>
<?php
  }
 ?>
