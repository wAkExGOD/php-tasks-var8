<html>

<head>
	<title>Lab 5</title>
</head>

<body>
	<main>
		<h3>Авторизация посетителя на сайте (логин, пароль, смена пароля и т.д.).</h3>
		<?php
		require_once 'Database.php';
		require_once 'User.php';

		$db = new Database();
		$connection = $db->getConnection();
		$user = new User($connection);

		// Регистрация
		if (isset($_POST['register'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($user->register($username, $password)) {
				echo "Регистрация успешна!";
			} else {
				echo "Ошибка регистрации.";
			}
		}

		// Авторизация
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if ($user->login($username, $password)) {
				echo "Авторизация успешна!";
			} else {
				echo "Неверный логин или пароль.";
			}
		}

		// Смена пароля
		if (isset($_POST['change_password'])) {
			$username = $_POST['username'];
			$newPassword = $_POST['new_password'];
			if ($user->changePassword($username, $newPassword)) {
				echo "Пароль успешно изменен!";
			} else {
				echo "Ошибка при смене пароля.";
			}
		}
		?>

		<!-- HTML форма -->
		<form method="post">
			<h2>Регистрация</h2>
			<input type="text" name="username" placeholder="Логин" required>
			<input type="password" name="password" placeholder="Пароль" required>
			<button type="submit" name="register">Зарегистрироваться</button>
		</form>

		<form method="post">
			<h2>Авторизация</h2>
			<input type="text" name="username" placeholder="Логин" required>
			<input type="password" name="password" placeholder="Пароль" required>
			<button type="submit" name="login">Войти</button>
		</form>

		<form method="post">
			<h2>Смена пароля</h2>
			<input type="text" name="username" placeholder="Логин" required>
			<input type="password" name="new_password" placeholder="Новый пароль" required>
			<button type="submit" name="change_password">Сменить пароль</button>
		</form>
	</main>
	<footer>
		<hr />
		<div>
			<p>Выполнил: Панасик Владислав</p>
			<p>
				Дата и время:
				<?
				date_default_timezone_set('Europe/Moscow');
				echo date('Y-m-d H:i:s');
				?>
			</p>
		</div>
	</footer>
</body>

</html>