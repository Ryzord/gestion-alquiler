# Release Notes

## [Unreleased](https://github.com/laravel/laravel/compare/v1.0.0...main)

## [v1.0.0](https://github.com/laravel/laravel/compare/v11.0.9...v1.0.0) - 2024-06-02

### v1.0.0 - First Stable Release

#### Description

This is the first stable release of the Gestión de Alquileres Turísticos application. This release includes the following features:

- User authentication
- Management of apartments (add, edit, delete)
- Management of incomes (add, edit, delete, calculate VAT and total invoice)
- Management of expenses (add, edit, delete, calculate VAT and total expense)
- Session logging with user, date, and time of session start and end
- Quarterly VAT calculation based on selected quarter
- Dashboard with financial summaries and statistics

#### Features

##### User Authentication

- Register, login, and logout functionality
- Middleware to protect routes

##### Apartment Management

- Add, edit, and delete apartments
- List of apartments

##### Income Management

- Add, edit, and delete incomes
- Calculate total invoice and VAT based on rate and number of people
- List of incomes

##### Expense Management

- Add, edit, and delete expenses
- Calculate total expense and VAT based on gross expense
- List of expenses

##### Dashboard

- List of incomes and expenses
- Total income and expense
- Financial result calculation
- Quarterly VAT calculation

#### Installation

Follow the instructions in the [README](https://github.com/2plu/gestion-alquiler#instalacion) to set up the project.

#### Changelog

##### Added

- User authentication and session logging
- Apartment management (CRUD)
- Intermediaries management (CRUD)
- Rates management (CRUD)
- Income management (CRUD, VAT, and total invoice calculation)
- Expense management (CRUD, VAT, and total expense calculation)
- Dashboard with financial summaries and quarterly VAT calculation

##### Fixed

- Bug fixes and performance improvements

#### Known Issues

- No known issues at this time

#### Contributions

Contributions are welcome. Please open an issue or pull request to discuss any changes.

#### License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/tu-usuario/tu-repositorio/blob/main/LICENSE) file for details.

## [v11.0.9](https://github.com/laravel/laravel/compare/v11.0.8...v11.0.9) - 2024-05-16

* Updated SMTP mail config to use a valid EHLO domain by [@rcerljenko](https://github.com/rcerljenko) in https://github.com/laravel/laravel/pull/6402

## [v11.0.8](https://github.com/laravel/laravel/compare/v11.0.7...v11.0.8) - 2024-05-13

* Add .phpactor.json to .gitignore by [@princejohnsantillan](https://github.com/princejohnsantillan) in https://github.com/laravel/laravel/pull/6400

## [v11.0.7](https://github.com/laravel/laravel/compare/v11.0.6...v11.0.7) - 2024-05-03

* Remove obsolete driver option by [@u01jmg3](https://github.com/u01jmg3) in https://github.com/laravel/laravel/pull/6395

## [v11.0.6](https://github.com/laravel/laravel/compare/v11.0.5...v11.0.6) - 2024-04-09

* Fix PHPUnit constraint by [@szepeviktor](https://github.com/szepeviktor) in https://github.com/laravel/laravel/pull/6389
* [11.x] Add missing roundrobin transport driver config by [@u01jmg3](https://github.com/u01jmg3) in https://github.com/laravel/laravel/pull/6392

## [v11.0.5](https://github.com/laravel/laravel/compare/v11.0.4...v11.0.5) - 2024-03-26

* [11.x] Use PHPUnit v11 by [@philbates35](https://github.com/philbates35) in https://github.com/laravel/laravel/pull/6385

## [v11.0.4](https://github.com/laravel/laravel/compare/v11.0.3...v11.0.4) - 2024-03-15

* [11.x] Removed useless null parameter for env helper (cache.php) by [@siarheipashkevich](https://github.com/siarheipashkevich) in https://github.com/laravel/laravel/pull/6374
* [11.x] Removed useless null parameter for env helper (queue.php) by [@siarheipashkevich](https://github.com/siarheipashkevich) in https://github.com/laravel/laravel/pull/6373
* [11.x] Fix retry_after to be an integer by [@driesvints](https://github.com/driesvints) in https://github.com/laravel/laravel/pull/6377
* [11.x] Fix on hover animation and ring by [@michaelnabil230](https://github.com/michaelnabil230) in https://github.com/laravel/laravel/pull/6376

## [v11.0.3](https://github.com/laravel/laravel/compare/v11.0.2...v11.0.3) - 2024-03-14

* [11.x] Revert collation change by [@driesvints](https://github.com/driesvints) in https://github.com/laravel/laravel/pull/6372

## [v11.0.2](https://github.com/laravel/laravel/compare/v11.0.1...v11.0.2) - 2024-03-13

* [11.x] Remove branch alias from composer.json by [@zepfietje](https://github.com/zepfietje) in https://github.com/laravel/laravel/pull/6366
* [11.x] Fixes typo in welcome page by [@jrd-lewis](https://github.com/jrd-lewis) in https://github.com/laravel/laravel/pull/6363
* change mariadb default by [@taylorotwell](https://github.com/taylorotwell) in https://github.com/laravel/laravel/commit/79969c99c6456a6d6edfbe78d241575fe1f65594

## [v11.0.1](https://github.com/laravel/laravel/compare/v11.0.0...v11.0.1) - 2024-03-12

* [11.x] Fixes SQLite driver missing by [@nunomaduro](https://github.com/nunomaduro) in https://github.com/laravel/laravel/pull/6361

## [v11.0.0 (2023-02-17)](https://github.com/laravel/laravel/compare/v10.3.2...v11.0.0)

Laravel 11 includes a variety of changes to the application skeleton. Please consult the diff to see what's new.
