<?php

function sayHello($name) {
	echo "Bài kiểm tra $name!";
}

?>

<html>
	<head>
	<title>Bài kiểm tra giữa kì môn Lập trình web nâng cao-N03</title>
	</head>
	<body>
		<?php 
		sayHello('giữa kỳ môn lập trình web nâng cao-N03');		
		?>
		<form action="./Controller/checkLogin.php" method="POST">
		<a>Username:</a><input type=text name="userName" size =16>
		<a>Password:</a><input type=password name="passWord" size =16>
		<input type=submit name=submit value="Login">
		</form>
	</body>
</html>