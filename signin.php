<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php  

	$server = "localhost";
	$user1 = "root";
	$password1 = "opo0";
	$link = mysqli_connect($server, $user1, $password1, "lunch");

	$feedback = "";

	if (!empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
		$login = $_REQUEST['login']; 
		
		$query = "SELECT*FROM users WHERE login='$login'";
		$result = mysqli_query($link, $query);  
		$user = mysqli_fetch_assoc($result);
		$flag = 1; 

		if (!empty($user)) {
			$salt = $user['salt'];
			$password = md5(md5($_REQUEST['password'].$salt));

			ini_set('date.timezone', 'Europe/Minsk');
			echo strtotime($user['bantime']);
			echo "\n";
			echo strtotime(date("d-m-Y H:i:s"));
			if (strtotime($user['bantime']) >  strtotime(date("d-m-Y H:i:s"))) {
				$feedback = "Вы забанены!";
				$flag = 0;
			}
			else {
				if ($password == $user['password'] && $flag == 1){
					session_start(); 

					$_SESSION['auth'] = $user['admin']; 
					$_SESSION['login'] = $user['login']; 
					$_SESSION['password'] = $user['password'];
					
	        		header("Location: http://localhost:8080/lab%208/main.php");
				} 
				else {
					$feedback = "Неправильный логин или пароль!";
				}
			}

		} 
		else {
			$feedback = "Неправильный логин или пароль!";
		}
	}

	?>
	<div class="signin-block">
		<div class="logo-img-lite">
			<a href="index.php">
				<img src="dist/img/logo.png" alt="Productly LCC">
			</a>
		</div>
		<form action="" method="POST">
			<h3>Вход</h3>
			<hr>
			<div class="form-group">
				<label for="exampleInputEmail1">Логин</label>
				<input type="text" class="form-control" name="login">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Пароль</label>
				<input type="password" class="form-control" name="password">
			</div>
			<?php echo "<h6 style=\"color: red\">" . $feedback . "</h6>"; ?>
			<button type="submit" class="btn btn-danger" style="background-color: #CF4946;">Подтвердить</button>
			<!-- <?php echo "<h6 style=\"color: red\">{$feedback}</h6>";?> -->
		</form>
	</div>
</body>
</html>