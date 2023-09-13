# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v4.0.0] - 2023-09-13

### Added

- Added support for Laravel 10.
- Added support for PHP 8.2.

### Removed

- Removed support for Laravel 9.
- Removed support for PHP 7.4.
- Removed support for PHP 8.0.

## [v3.0.0] - 2022-11-18

### Added

- PHP versions constrained in [composer.json](composer.json) to 7.2, 7.3, and 7.4.
- This CHANGELOG file.
- Support for version 2 of `cakephp/chronos`.

### Changed

- Supported PHP versions to 7.4, 8.0, and 8.1.
- Minimum PHPUnit version to 9.3.
- Migrated PHPUnit configuration to 9.3 format.

### Removed

- Tracking coverage in Coveralls.
- Support for version 1 of `cakephp/chronos`.

## [v2.0.0] - 2018-12-20

### Added

- Badges to [README.md](README.md).

### Changed

- Renamed namespace `HealthEngine\Laravel\Extension` to `HealthEngine\LaravelChronos`.  
- Renamed trait `HasChronosTimestamps` to `ChronosTimestamps`.


## [v1.0.0] - 2018-12-19

### Added

- The first release of this package.

[v4.0.0]: https://github.com/HealthEngineAU/laravel-chronos/compare/v3.0.0...v4.0.0
[v3.0.0]: https://github.com/HealthEngineAU/laravel-chronos/compare/2.0.0...v3.0.0
[v2.0.0]: https://github.com/HealthEngineAU/laravel-chronos/compare/1.0.0...2.0.0
[v1.0.0]: https://github.com/HealthEngineAU/laravel-chronos/releases/tag/1.0.0
