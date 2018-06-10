<?php

session_start();

?>
<!DOCTYPE html>

<html>

<head>



<title> 광야 </title>

<!--  <link rel="stylesheet" href="styletest.css" />  -->

<link rel="stylesheet" href="styletest.css" />



<script language="javascript">



function checkemail(_emailinfo, IdArray){

	// check email type.

	if("" == _emailinfo){

		alert("전자 메일 정보를 입력해 주세요!");

		return false;

	}

	if(("" == IdArray[0].value) || ("" == IdArray[1].value))

	{

		alert("전자 메일 정보를 입력해 주세요!");

		return false;

	}

	// Need to suplement the empty string check code.

	return true;

}



function SubmitLogin(){

	var _IdArray = document.getElementById("loginform");

	var emailinfo = _IdArray[0].value + "@" + _IdArray[1].value;

	var passinfo = _IdArray[2].value;



	if(checkemail(emailinfo, _IdArray)){

		if("" != passinfo){

			_IdArray.submit();

		}

		else{

			alert("비밀번호를 입력해 주세요!");

		}

	}

}



function submitMembership(){

	var _sub = document.getElementById("membershipform");

	_sub.submit();

}



function SubmitLogOut(){

	var _subaction = document.getElementById("logoutform");

	_subaction.submit();

}

</script>

</head>



<body>



<br>

<br>

<table id="thewordtable" align="center" border="0" align="left" width="900">

<tr> <td>

(창세기 1장 1절)<br>

태초에 하나님이 천지를 창조하시니라.

</td> </tr>

<tr> <td>

<br>

(사도행전 4:11 ~ 12)<br>

 이 예수는 너희 건축자들의 버린 돌로서 집 모퉁이의 머릿돌이 되었느니라.<br>

 다른 이로써는 구원을 받을 수 없나니 천하 사람 중에 구원을 받을 만한 다른 이름을 우리에게 주신 일이 없음이라 하였더라.

</td> </tr>

<tr> <td>

<br>
(요한계시록 22장 21절)<br>

주 예수의 은혜가 모든 자들에게 있을지어다. 아멘.

</td> </tr>

</table>



<br>

<br>



<table id="logintable" align="center" width="900" border="0">

	<tr><td>
<?php

	if($_SESSION["testuser"])

	{
	?>

	<?php } else { ?>

	<form id="loginform" align="left" action="http://localhost/login_action.php?login=yes" method="post">

		<label>전자메일</label><br>

			<input type="text" name="identification" value="">@<input align="left" type="text" name="emailcompany" value=""> <br>

		<label>비밀번호</label><br>

			<input type="password" name="pwd" value=""><br>

	</form>

	<form id="membershipform" action="http://localhost/membership_main.php" method="post"> </form>

	<?php } ?>

	</form>

	</td></tr>

	<tr align="left"><td>

	<br>

	<?php

	if($_SESSION["testuser"])

	{

	?>

	<input type="button" value="로그 아웃하기" onclick="location.href='login_action.php?logout=yes';" />

	<?php } else { ?>

	<input type="button" onclick="SubmitLogin()" value="로그인하기" />

	<input type="button" onclick="submitMembership()" value="회원 가입하기" />

	<?php } ?>

	</td></tr>

</table>

</body>

</html>



<?php
if($_SESSION["testuser"])
 {
  } else { ?>
<form name="loginform" action="http://13.125.107.155/login_action.php?login=yes"  method="post" class="login-form">
<div class="form-group">
  <label class="sr-only" for="form-username">이메일</label>
    <input type="text" name="identification" value="" placeholder="이메일" class="form-username form-control" id="form-username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="form-password">비밀번호</label>
    <input type="password" name="pwd" value="" placeholder="비밀번호" class="form-password form-control" id="form-password">
  </div>
    </form>
    <form id="membershipform" action="http://13.125.107.155/membership_main.php" method="post"> </form>
  <?php } ?>
  <?php
  if($_SESSION["testuser"])
  {
  ?>
  <input type="button" value="로그 아웃하기" onclick="location.href='login_action.php?logout=yes';" />
     <?php } else { ?>

    <input type="button" onclick="SubmitLogin()" class="btn" value="로그인하기" />

    <input type="button" onclick="submitMembership()" class="btn" value="회원 가입하기" />

    <?php } ?>
