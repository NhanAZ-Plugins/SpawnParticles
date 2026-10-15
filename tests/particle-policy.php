<?php

declare(strict_types=1);

namespace{
	require dirname(__DIR__) . "/src/SpawnParticles/ParticleBatch.php";

	function check(bool $condition, string $message) : void{
		if(!$condition){ throw new \RuntimeException($message); }
	}

	check(\SpawnParticles\ParticleBatch::TICK_INTERVAL === 20, "The particle loop must run once per second.");
	check(\SpawnParticles\ParticleBatch::PARTICLES_PER_RUN === 31, "The original batch size must be preserved per scheduled run.");

	$ranges = [];
	$sample = \SpawnParticles\ParticleBatch::sample(static function(int $minimum, int $maximum) use (&$ranges) : int{
		$ranges[] = [$minimum, $maximum];
		return $minimum;
	});
	check($sample["offset"] === [-10, -10, -10], "Position offsets must remain within the bounded radius.");
	check($sample["color"] === [0, 0, 0], "Color channels must stay inside valid RGB bounds.");
	check($ranges === [[-10, 10], [-10, 10], [-10, 10], [0, 255], [0, 255], [0, 255]], "The random source must receive the expected bounded ranges.");

	echo "SpawnParticles bounded interval, batch size, offsets, and RGB checks passed.\n";
}
