<?php

namespace SpawnParticles;

use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\level\particle\DustParticle;

class Main extends PluginBase implements Listener {

public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->getServer()->getScheduler()->scheduleRepeatingTask(new SpawnParticles($this), 0);
    }
}

class SpawnParticles extends PluginTask {

public function __construct($plugin) {
$this->plugin = $plugin;
parent::__construct($plugin);
}

public function onRun($tick) {
for ($i = 0; $i <= 30; $i++) {
$this->plugin->getServer()->getDefaultLevel()->addParticle((new DustParticle(new Vector3($this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getX(), $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getY(), $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getZ()), rand(0,300), rand(0,300), rand(0,300), 1))->setComponents($this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getX() + rand(-10,10), $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getY() + rand(-10,10), $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn()->getZ() + rand(-10,10)));
        }
    }
}