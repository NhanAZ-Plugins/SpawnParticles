# SpawnParticles

SpawnParticles displays bounded colored dust particles around the default Axolotl-PM world spawn.

## Compatibility

- Minimum Axolotl-PM API: `5.0.0`.
- CI runs PHPStan at maximum level and builds against exact Axolotl-PM API source revisions for `5.0.0` and `5.49.2`.
- CI starts the built PHAR on Axolotl-PM `5.49.2`.
- These are the verified compatibility points; intermediate patch releases are not inferred from the matrix.

The particle task runs every 20 ticks and emits 31 particles per run. Each particle uses RGB components from `0` to `255` and a random offset within 10 blocks of the world's spawn. This replaces the historical zero-tick scheduler period and out-of-range color values.

## Build and validation

GitHub Actions uses [DevTools](https://github.com/NhanAZ/DevTools) to run PHPStan at maximum level, build the plugin PHAR and validate its contents. Workflow dependencies and the server artifact are pinned to exact revisions or checksums for reproducibility.

The repository has no `LICENSE` file; no general source reuse license is granted.

For questions about the NhanAZ ecosystem, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
