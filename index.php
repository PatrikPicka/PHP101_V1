<?php
session_start();
require_once __DIR__ . '\core\Sessions.php';
require_once __DIR__ . '\core\Functions.php';

$isLogged = false;
$user = null;
$displayAlert = sessionExists('alert');

if (sessionExists('loggedInUserId')) {
	$isLogged = true;
	$user = getUser(getSessionData('loggedInUserId'));
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP 101</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
		  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
<?php if ($isLogged && $user !== null): ?>
	<div class="user-widget">
		<p class="widget-username"><?= $user->username ?></p>
		<div class="divider-vertical"></div>
		<a href="./core/User.php?action=logout">Logout</a>
	</div>
<?php endif; ?>
<section id="landing">
	<div class="columns-container">
		<div class="column-left">
			<?php if (!$isLogged): ?>
				<div class="forms-container">
					<h2>Login or Register</h2>
					<div class="login-wrapper">
						<button class="btn btn-primary login-btn">Login</button>
						<form class="login-form" action="./core/User.php" method="post">
							<div class="close-login-form">
								<i class="fa fa-times"></i>
							</div>
							<div class="form-group">
								<label for="login-username">Username: </label>
								<input type="text" name="username" class="form-control" id="login-username">
							</div>
							<div class="form-group">
								<label for="login-password">Password: </label>
								<input type="password" name="password" class="form-control" id="login-password">
							</div>
							<input type="hidden" name="action" value="login">
							<input type="submit" style="display: none;">
						</form>
					</div>
					<div class="register-wrapper">
						<button class="btn btn-primary register-btn">Register</button>
						<form class="register-form" action="./core/User.php" method="post">
							<div class="close-register-form">
								<i class="fa fa-times"></i>
							</div>
							<div class="form-group">
								<label for="register-email">Email: </label>
								<input type="text" name="email" class="form-control" id="register-email">
							</div>
							<div class="form-group">
								<label for="register-username">Username: </label>
								<input type="text" name="username" class="form-control" id="register-username">
							</div>
							<div class="form-group">
								<label for="register-password">Password: </label>
								<input type="password" name="password" class="form-control" id="register-password">
							</div>
							<input type="hidden" name="action" value="register">
							<input type="submit" style="display: none;">
						</form>
					</div>
				</div>
			<?php else: ?>
				<div class="logged-in-user-data-wrapper">
					<h3>Welcome <?= $user->username ?>!</h3>
					<h5><?= $user->email ?></h5>
				</div>
			<?php endif; ?>

			<div class="waves-container">
				<div class="relative-wrapper">
					<div class="wave-1">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="52 128.405 350 319.6">
							<path d="M 52 150 c 101 -88 239 130 350 0 l 0 298 l -350 0" fill="#F3A095"/>
						</svg>
					</div>
					<div class="wave-2">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="52 128.405 350 319.6">
							<path d="M 52 150 c 101 -88 239 130 350 0 l 0 298 l -350 0" fill="#EC7564"/>
						</svg>
					</div>
					<div class="wave-3">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="52 128.405 350 319.6">
							<path d="M 52 150 c 101 -88 239 130 350 0 l 0 298 l -350 0" fill="#EF5742"/>
						</svg>
					</div>
				</div>
			</div>
		</div>
		<div class="column-right">
			<div class="logo-wrapper">
				<img src="./img/PHP_101_logo.png" alt="PHP 101">
			</div>
			<h1>Become a web developer</h1>
			<h3>From begginer to intermediate programmer in one course</h3>
			<button class="btn btn-primary btn-showmore">
				<h2>What can i learn?</h2>
			</button>
		</div>
	</div>
</section>

<section class="about-us" id="about-us">
	<div class="container">
		<h1 class="my-5">About the course</h1>
		<div class="about-text">
			<p>Ad fugiat elit ea amet commodo quis excepteur aute ipsum voluptate. Et consectetur consequat eiusmod
				veniam aliquip aliquip in. Eiusmod aliquip officia do nulla ex elit aute consequat minim ipsum in aute.
				<br>
				Nulla est consequat officia anim id minim. Id nulla adipisicing tempor nisi commodo nostrud dolore
				nostrud ad officia mollit culpa nostrud velit. Aliqua aliqua minim ex tempor reprehenderit eiusmod
				cupidatat.
				<br>
				Dolor sint officia eiusmod sint anim in incididunt elit tempor anim cupidatat. Minim sit aliqua eiusmod
				magna duis consequat. Esse velit aliqua cupidatat labore anim excepteur consectetur excepteur aliqua id
				et. Mollit nisi incididunt id est fugiat laboris nostrud nisi. Reprehenderit proident deserunt occaecat
				dolor proident commodo incididunt reprehenderit duis. Dolor dolore dolore dolor nulla quis sunt velit ad
				ullamco nostrud proident voluptate.
			</p>
		</div>
	</div>
</section>

<?php if ($displayAlert): ?>
	<div class="alert alert-<?= getSessionData('alert')['type']; ?>" role="alert">
		<?= sessionFlash('alert')['message']; ?>
	</div>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
		integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"
		integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./assets/js/js.js"></script>
<script>
	<?php if ($displayAlert): ?>
	$(document).ready(() => {
		$('.alert').show();

		setTimeout(() => {
			$('.alert').hide();
		}, 5000);
	});
	<?php endif; ?>
</script>
</body>

</html>