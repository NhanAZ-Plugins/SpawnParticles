<?php

declare(strict_types=1);

namespace SpawnParticles;

final class ParticleBatch{
	public const TICK_INTERVAL = 20;
	public const PARTICLES_PER_RUN = 31;
	public const POSITION_RADIUS = 10;
	public const COLOR_MAX = 255;

	/**
	 * @param callable(int, int): int $randomInteger
	 * @return array{offset: array{int, int, int}, color: array{int, int, int}}
	 */
	public static function sample(callable $randomInteger) : array{
		return [
			"offset" => [
				$randomInteger(-self::POSITION_RADIUS, self::POSITION_RADIUS),
				$randomInteger(-self::POSITION_RADIUS, self::POSITION_RADIUS),
				$randomInteger(-self::POSITION_RADIUS, self::POSITION_RADIUS)
			],
			"color" => [
				$randomInteger(0, self::COLOR_MAX),
				$randomInteger(0, self::COLOR_MAX),
				$randomInteger(0, self::COLOR_MAX)
			]
		];
	}
}
