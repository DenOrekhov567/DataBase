<?php

declare(strict_types=1);

namespace DataBase\provider;

class SQL
{

	private static \mysqli $db;

	public static function init(): void {
		$connection = new \mysqli("localhost", "root", "");

		if($connection->connect_error) {
			die("Ошибка подключения: " . $connection->connect_error);
		}

		$connection->query("CREATE DATABASE IF NOT EXISTS db");

		$database = new \mysqli("localhost", "root", "", "db");
		$database->query("CREATE TABLE IF NOT EXISTS `accounts`(
				`nickname` VARCHAR(255) NOT NULL,
				`json` JSON NOT NULL
			);"
			
		);
		
		$database->query("ALTER TABLE `accounts` ADD UNIQUE KEY `nickname` (`nickname`);");

		self::$db = $database;
		var_dump(self::$db);
	}

	public static function getDatabase(): \mysqli {
		return self::$db;
	}

}