# Laravel Chronos

This is a custom package designed for Laravel Eloquent. It provides a trait that can be used in model classes that will
cast datetime fields to ChronosInterface instead of Carbon instances.

Chronos is a drop-in replacement for Carbon but is immutable by default. It also provides an interface that can be used
for some genericising as well.

See the [Chronos documentation](https://book.cakephp.org/3.0/en/chronos.html) for more information.
