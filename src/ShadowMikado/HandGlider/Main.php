<?php

namespace ShadowMikado\HandGlider;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use ShadowMikado\HandGlider\listeners\HandGlider;

class Main extends PluginBase implements Listener {
    use SingletonTrait;

    public static Config $config;
    public function onLoad(): void
    {
        self::setInstance($this);
        $this->getLogger()->info("Loading...");
    }

    public function onEnable(): void
    {
        $this->getLogger()->info("Enabling...");
        $this->saveDefaultConfig();
        self::$config = $this->getConfig();
        Server::getInstance()->getPluginManager()->registerEvents(new HandGlider(), $this);
    }

    public function onDisable(): void
    {
        $this->getLogger()->info("Disabling...");
    }

}