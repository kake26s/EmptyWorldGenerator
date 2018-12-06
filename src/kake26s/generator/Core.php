<?php

namespace kake26s\generator;

use kake26s\generator\command\GenerateCommand;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Core extends PluginBase implements Listener {

	private static $core;

	public function onLoad() {
		self::$core = $this;
	}

	public function onEnable() {
		$this->getLogger()->info(TextFormat::AQUA . "読み込みました");
		$this->registerCommands();
	}

	public function registerCommands() {
		$map = $this->getServer()->getCommandMap();
		$commands = [
			new GenerateCommand()
		];

		$map->registerAll($this->getName(), $commands);
	}
}