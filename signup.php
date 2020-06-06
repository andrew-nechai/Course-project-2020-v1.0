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

		function generateSalt()
        {
            $salt = '';
            $length = rand(5, 10); // длина соли (от 5 до 10 сомволов)

            for ($i = 0; $i < $length; $i++) {
                $salt .= chr(rand(33, 126)); // символ из ASCII-table
            }

            return $salt;
        }

		$server = "localhost";
		$user1 = "root";
		$password1 = "opo0";
        ini_set('date.timezone', 'Europe/Minsk');
		$link = mysqli_connect($server, $user1, $password1, "lunch");
		$login = "";
		$password = "";
		$name = "";
		$surname = "";
		$feedback = "";

		if (isset($_POST['login'])) {

			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$login = $_POST['login'];
			$salt = generateSalt();
			$password = $_POST['password'];
			$password = md5(md5($password . $salt));
			$admin = 0;
			$ban = 0;
			$bantime = date("Y-m-d H:i:s");
			
			$query = "SELECT*FROM users WHERE login = '$login'";
			$result = mysqli_query($link, $query);	
			$is_login_free = mysqli_fetch_array($result);

			if (empty($is_login_free)) {
				mysqli_set_charset($link, "utf8");
				$query = "INSERT INTO `users` (`login`, `password`, `name`, `surname`, `salt`, `admin`, `ban`, bantime) VALUES ('$login', '$password', '$name', '$surname', '$salt', '$admin', '$ban', '$bantime')";
				mysqli_query($link, $query);
			}
			else {
				$feedback = "Такой логин уже существует.";
			}
		}
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// while ($res = mysqli_fetch_array($result)) {
		// 	echo "<pre>";
		// 	print_r($res['login']);
		// 	echo "</pre>";
		// }

	?>
	<div class="registration-block">
		<div class="logo-img">
			<a href="index.php">
				<img src="dist/img/logo.png" alt="Productly LCC">
			</a>
		</div>
		<form action="" method="POST">
			<h3>Регистрация</h3>
			<hr>
			<?php echo "<h6 style=\"color: red\">{$feedback}</h6>";?>
			<fieldset>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="exampleInputEmail1">Имя</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="name">
						<small class="form-text text-muted">Не обязятельно</small>
					</div>
				</div>
				<div class="col">	
					<div class="form-group">
						<label for="exampleInputEmail1">Фамилия</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="surname">
						<small class="form-text text-muted">Не обязятельно</small>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Логин</label>
				<input type="text" max="70" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" minlength="4" maxlength="12" name="login" required>
				<small id="emailHelp" class="form-text text-muted">От 4 до 12 символов.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Пароль</label>
				<input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" minlength="6" maxlength="10" name="password" required>
				<small id="emailHelp" class="form-text text-muted">От 6 до 10 символов.</small>
			</div>
			<button type="submit" class="btn btn-danger" style="background-color: #CF4946;">Подтвердить</button>
			</fieldset>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>