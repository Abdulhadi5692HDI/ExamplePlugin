<?php

namespace ExamplePlugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase implements Listener{
// This shows the onload function
	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "I've been loaded!");
                // How about a warning
                $this->getLogger()->warning("Warning Example");
         
       // Critical, errors, notices
	
       $this->getLogger()->critical("A example of this");
        $this->getLogger()->error("Fake error");
          $this->getLogger()->notice("The api is the best!");

	public function onEnable(){
	// Lets see the basic functions onEnable and onDisable
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastPluginTask($this), 120);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "I've been enabled!");
    }           $this->getLogger()->notice("PHP started UwU");

	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "I've been disabled!");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "example":
				$sender->sendMessage("Hello ".$sender->getName()."!");
				return true;
			default:
				return false;
		}
	}

	/**
	 * @param PlayerRespawnEvent $event
	 *
	 * @priority        NORMAL
	 * @ignoreCancelled false
	 */
	public function onSpawn(PlayerRespawnEvent $event){
		Server::getInstance()->broadcastMessage($event->getPlayer()->getDisplayName() . " has just spawned!");
	}
}
