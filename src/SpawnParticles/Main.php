<?php

declare(strict_types=1);

namespace SpawnParticles;

use pocketmine\color\Color;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\world\particle\DustParticle;

final class Main extends PluginBase{
	protected function onEnable() : void{
		$this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function() : void{
			$this->spawnParticles();
		}), ParticleBatch::TICK_INTERVAL);
	}

	private function spawnParticles() : void{
		$world = $this->getServer()->getWorldManager()->getDefaultWorld();
		if($world === null){
			return;
		}

		$spawn = $world->getSpawnLocation();
		for($i = 0; $i < ParticleBatch::PARTICLES_PER_RUN; $i++){
			$sample = ParticleBatch::sample(static fn(int $minimum, int $maximum) : int => random_int($minimum, $maximum));
			[$offsetX, $offsetY, $offsetZ] = $sample["offset"];
			[$red, $green, $blue] = $sample["color"];

			$world->addParticle(
				new Vector3($spawn->x + $offsetX, $spawn->y + $offsetY, $spawn->z + $offsetZ),
				new DustParticle(new Color($red, $green, $blue))
			);
		}
	}
}
