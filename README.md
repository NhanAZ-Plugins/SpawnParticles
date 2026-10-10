# SpawnParticles

SpawnParticles is a historical PocketMine-MP plugin that places colored dust particles near the default world's spawn point.

## Compatibility and status

The manifest declares PocketMine-MP API `1.0.0`. The source uses the old `PluginTask`, `pocketmine\level\particle\DustParticle` and default level APIs. It has not been ported to Axolotl-PM 5 and has no verified current server build or runtime test. Do not install this source on a production Axolotl-PM server.

## Historical behavior

The plugin schedules a repeating task that attempts to create 31 dust particles per run around the default spawn. It has no commands or configuration. The scheduled period is `0` in the original source, and the random color components can exceed the usual RGB range. A future port must define a valid schedule, bounded particle colors and a measured performance budget before claiming equivalent behavior.

There is no CI workflow, DevTools PHAR or verified release in this repository. No license file or author field is present. Resolve redistribution rights from the original rights holder before publishing a modified build.

For questions about the NhanAZ ecosystem, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
