<?php
require_once __DIR__ . '\Functions.php';
require_once __DIR__ . '\Defines.php';


try {
	define('DB', new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USERNAME, DB_PASSWORD));
	DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch	(Exception $exception) {
	die($exception->getMessage());
}

/**
 * @param string $sql
 * @param array $params
 * @return PDOStatement|null
 */
function prepareAndBIndParams(string $sql, array $params): ?PDOStatement
{
	if ($query = DB->prepare($sql)) {
		foreach ($params as $key => $param) {
			$query->bindValue($key, $param);
		}

		return $query;
	} else {
		createAlert('Ooops.. Something wen\'t wrong while trying to connect to database.', MESSAGE_ERROR);

		return null;
	}
}

/**
 * @param PDOStatement $query
 * @param string $message
 * @return void
 */
function checkUnique(PDOStatement $query, string $message): void
{
	if ($query->execute()) {
		if (count($query->fetchAll(PDO::FETCH_OBJ)) > 0) {
			createAlert($message, MESSAGE_WARNING);
			redirectToHomepage();
		}
	} else {
		createAlert('Ooops... Something wen\'t wrong...', MESSAGE_ERROR);
		redirectToHomepage();
	}
}