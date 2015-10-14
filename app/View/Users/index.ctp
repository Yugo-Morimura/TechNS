<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>TechNS</title>
	<link rel="stylesheet" href="stylesheets/main.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/top.js"></script>
</head>
<body class="overlay">
	<div id="techns-top">

		<h1>休憩所商い中</h1>

		<div class="login top-form">
			<h2>Login</h2>
			<p class="switch">
				<a href="#" class="sub_text" id="signup">Sign Up</a>
			</p>
			<form action="/user/login" method="post">
				<input type="email" name="data[User][email]" placeholder="Mail Address">
				<input type="password" name="data[User][password]" placeholder="Password">
				<input type="submit" value="GO">
			</form>
		</div>

		<div class="sign_up top-form">
			<h2>Sign up</h2>
			<p class="switch">
				<a href="#" class="sub_text" id="login">Login</a>
			</p>
			<form action="/user/add" method="post">
				<input type="text" name="data[User][name]" placeholder="User name">
				<input type="email" name="data[User][email]" placeholder="Mail Address">
				<input type="password" name="data[User][password]" placeholder="Password">
				<input type="submit" value="GO">
			</form>
		</div>
	</div>
</body>
</html>