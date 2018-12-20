# Laravel Chronos

[![Latest Stable Version](https://poser.pugx.org/healthengine/laravel-chronos/version)](https://packagist.org/packages/healthengine/laravel-chronos)
[![Total Downloads](https://poser.pugx.org/healthengine/laravel-chronos/downloads)](https://packagist.org/packages/healthengine/laravel-chronos)
[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-chronos.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-chronos)
[![Coverage Status](https://coveralls.io/repos/github/HealthEngineAU/laravel-chronos/badge.svg?branch=master)](https://coveralls.io/github/HealthEngineAU/laravel-chronos?branch=master)

This is a custom package designed for Laravel Eloquent. It provides a trait that can be used in model classes that will
cast datetime fields to ChronosInterface instead of Carbon instances.

Chronos is a drop-in replacement for Carbon but is immutable by default. It also provides an interface that can be used
for some genericising as well.

See the [Chronos documentation](https://book.cakephp.org/3.0/en/chronos.html) for more information.

## Usage

To convert datetime casts from Carbon instances to Chronos instances in an Eloquent model, all you need to do is `use`
this trait in the model. An example is shown below:

```php
use HealthEngine\Laravel\Extension\ChronosTimestamps;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ChronosTimestamps;

    protected $dates = [
        'seen_at',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
    ];
}
```

## License

Laravel Chronos is licensed under the MIT license.
