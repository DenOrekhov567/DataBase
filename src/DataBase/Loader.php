<?php

declare(strict_types=1);

namespace DataBase;

use pocketmine\plugin\PluginBase;

use pocketmine\Server;

use DataBase\provider\SQL;

class Loader extends PluginBase
{

	public function onEnable(): void {
		SQL::init();
	}

}