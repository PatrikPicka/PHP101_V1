<?php
require_once __DIR__ . '\Defines.php';
require_once __DIR__ . '\Sessions.php';
require_once __DIR__ . '\DB.php';

/**
 * @param string $param
 * @return mixed
 */
function get(string $param): mixed
{
	if (array_key_exists($param, $_GET)) {
		return $_GET[$param];
	} elseif (array_key_exists($param, $_POST)) {
		return $_POST[$param];
	}

	return null;
}

/**
 * @param string $message
 * @param string $type
 * @return void
 */
function createAlert(string $message, string $type = MESSAGE_SUCCESS): void
{
	setSession('alert', [
		'type' => $type,
		'message' => $message,
	]);
}

/**
 * @return void
 */
function redirectToHomepage(): void
{
	header('Location:' . BASE_URL);
	die();
}

/**
 * @param mixed $param
 * @return void
 */
function dd(mixed $param) {
	echo '<pre>' . var_dump($param) . '</pre>';
	die();
}

/**
 * @param int $id
 * @return stdClass|null
 */
function getUser(int $id): ?stdClass
{
	$getUserSql = 'SELECT id, username, email FROM user WHERE id = :id';
	$query = prepareAndBIndParams($getUserSql, [
		'id' => $id
	]);

	if ($query->execute()) {
		return $query->fetchObject();
	}

	return null;
}