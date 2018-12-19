# Laravel Chronos

[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-chronos.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-chronos)
[![Coverage Status](https://coveralls.io/repos/github/HealthEngineAU/laravel-chronos/badge.svg?branch=coveralls)](https://coveralls.io/github/HealthEngineAU/laravel-chronos?branch=coveralls)

This is a custom package designed for Laravel Eloquent. It provides a trait that can be used in model classes that will
cast datetime fields to ChronosInterface instead of Carbon instances.

Chronos is a drop-in replacement for Carbon but is immutable by default. It also provides an interface that can be used
for some genericising as well.

See the [Chronos documentation](https://book.cakephp.org/3.0/en/chronos.html) for more information.

## Usage

To convert datetime casts from Carbon instances to Chronos instances in an Eloquent model, all you need to do is `use`
this trait in the model. An example is shown below:

```php
use HealthEngine\Laravel\Extension\HasChronosTimestamps;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasChronosTimestamps;

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
