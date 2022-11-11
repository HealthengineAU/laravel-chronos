# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- PHP versions constrained in [composer.json](composer.json) to 7.2, 7.3, and 7.4.
- This CHANGELOG file.

### Changed

- Supported PHP versions to 7.4, 8.0, and 8.1.
- Minimum PHPUnit version to 9.3.
- Migrated PHPUnit configuration to 9.3 format.

### Removed

- Tracking coverage in Coveralls.

## [2.0.0] - 2018-12-20

### Added

- Badges to [README.md](README.md).

### Changed

- Renamed namespace `HealthEngine\Laravel\Extension` to `HealthEngine\LaravelChronos`.  
- Renamed trait `HasChronosTimestamps` to `ChronosTimestamps`.


## [1.0.0] - 2018-12-19

### Added

- The first release of this package.

[unreleased]: https://github.com/HealthEngineAU/laravel-chronos/compare/2.0.0...HEAD
[2.0.0]: https://github.com/HealthEngineAU/laravel-chronos/compare/1.0.0...2.0.0
[1.0.0]: https://github.com/HealthEngineAU/laravel-chronos/releases/tag/1.0.0
