<?php
session_start();
require_once __DIR__ . '\Functions.php';
require_once __DIR__ . '\DB.php';

if (!empty(get('action')) && get('action') === 'login') {
	$username = get('username');
	$password = get('password');

	$getUserSql = 'SELECT * FROM user WHERE username = :username OR email = :email LIMIT 1';
	$query = prepareAndBIndParams($getUserSql, [
		'username' => $username,
		'email' => $username,
	]);

	if ($query === null) {
		createAlert('Ooops... Something wen\'t wrong...', MESSAGE_ERROR);
		redirectToHomepage();
	}

	if ($query->execute()) {
		$user = $query->fetchObject();
		if ($user === null || !$user) {
			createAlert('Špatně zadané přihlašovací jméno nebo email.', MESSAGE_WARNING);
			redirectToHomepage();
		} elseif (!password_verify($password, $user->password)) {
			createAlert('Špatně zadané heslo.', MESSAGE_WARNING);
			redirectToHomepage();
		}

		setSession('loggedInUserId', $user->id);
		createAlert('Welcome ' . $user->username . '!');
		redirectToHomepage();
	} else {
		createAlert('Ooops... Something wen\'t wrong...', MESSAGE_ERROR);
		redirectToHomepage();
	}

} elseif (!empty(get('action')) && get('action') === 'register') {
	$email = get('email');
	$username = get('username');
	$password = get('password');

	$userExistsSql = 'SELECT * FROM user WHERE username = :username OR email = :email;';
	$query = prepareAndBIndParams($userExistsSql, [
		'username' => $username,
		'email' => $email,
	]);

	if ($query === null) {
		redirectToHomepage();
	}
	checkUnique($query, 'User with this login already exists.');

	$createUserSql = 'INSERT INTO user (username, email, password) VALUES (:username, :email, :password);';
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$createUserQuery = prepareAndBIndParams($createUserSql, [
		'username' => $username,
		'email' => $email,
		'password' => $hashedPassword,
	]);

	if ($createUserQuery === null || !$createUserQuery->execute()) {
		createAlert('Ooops... Something went wrong while inserting data to database.');
		redirectToHomepage();
	}

	setSession('loggedInUserId', DB->lastInsertId());
	createAlert('Registrated successfully! Welcome ' . $username . '.');
	redirectToHomepage();
} elseif (!empty(get('action')) && get('action') === 'logout') {
	deleteSession('loggedInUserId');
	redirectToHomepage();
}else {
	createAlert('Access denied.', MESSAGE_WARNING);
	redirectToHomepage();
}