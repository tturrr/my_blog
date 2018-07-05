<?php
$bNo = $_POST['b_no'];

$bTitle = "매진 되었습니다.";

 ?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
 <script type="text/javascript" src="https://service.iamport.kr/js/iamport.payment-1.1.5.js"></script>


<script>
IMP.init('imp23342400'); // 'iamport' 대신 부여받은 "가맹점 식별코드"를 사용
IMP.request_pay({
    pg : 'html5_inicis', // version 1.1.0부터 지원.
    pay_method : 'card',
    merchant_uid : 'merchant_' + new Date().getTime(),
    name : '주문명:<?php echo $_POST["b_title"]?>',
    amount : <?php echo $_POST["b_price"]?>,
    buyer_email : '<?php echo $_POST["p_mail"]?>',
    buyer_name : '<?php echo $_POST["p_name"]?>',
    buyer_tel : '<?php echo $_POST["cellPhone"]?>',
    buyer_addr : '<?php echo $_POST["street_address"]?>',
    m_redirect_url : 'http://13.125.107.155/post.php'
}, function(rsp) {
    if ( rsp.success ) {
        var msg = '결제가 완료되었습니다.';
        msg += '고유ID : ' + rsp.imp_uid;
        msg += '상점 거래ID : ' + rsp.merchant_uid;
        msg += '결제 금액 : ' + rsp.paid_amount;
        msg += '카드 승인번호 : ' + rsp.apply_num;
        <?php
        $con = mysqli_connect("127.0.0.1", "root", "a1214511", "joeltestdb");
        $sql = 'UPDATE shop set b_title="' . $bTitle . '"  where b_no = ' . $bNo;
        $result = mysqli_query($con, $sql);
         ?>

        alert('결제가 완료되었습니다.');
          location.href='post.php';
    } else {
        var msg = '결제에 실패하였습니다.';
        msg += '에러내용 : ' + rsp.error_msg;
        alert('결제를 취소하셨습니다.');
        location.href='post.php';
    }

});
</script>
