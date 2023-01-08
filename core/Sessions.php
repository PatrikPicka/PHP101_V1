<?php
/**
 * @param string $param
 * @return bool
 */
function sessionExists(string $param): bool
{
	return array_key_exists($param, $_SESSION);
}

/**
 * @param string $param
 * @return mixed
 */
function getSessionData(string $param): mixed
{
	if (sessionExists($param)) {
		return $_SESSION[$param];
	}

	return null;
}

/**
 * @param string $name
 * @param mixed $data
 * @return void
 */
function setSession(string $name, mixed $data): void
{
	$_SESSION[$name] = $data;
}

/**
 * @param string $name
 * @return void
 */
function deleteSession(string $name): void
{
	if (sessionExists($name)) {
		unset($_SESSION[$name]);
	}
}

/**
 * @param string $name
 * @return mixed
 */
function sessionFlash(string $name): mixed
{
	if (sessionExists($name)) {
		$session = getSessionData($name);
		deleteSession($name);

		return $session;
	}

	return null;
}