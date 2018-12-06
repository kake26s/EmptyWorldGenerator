<?php

namespace kake26s\generator\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\generator\GeneratorManager;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GenerateCommand extends Command {

	public function __construct() {
		$this->setPermission("generator.generator");
		parent::__construct("generate", "EmptyWorldを生成します", "/generate [作成したいワールド名]");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) {
		$worldName = $args[0];

		if (Server::getInstance()->isLevelGenerated($worldName)) {
			$sender->sendMessage(TextFormat::AQUA . "「{$worldName}」は既に存在しています");
			return;
		}

		$preset = "2;10x0;1";
		Server::getInstance()->generateLevel($worldName, null, GeneratorManager::getGenerator("flat"), ["preset"=>$preset]);
	}

}