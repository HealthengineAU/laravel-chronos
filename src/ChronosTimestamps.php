<?php

namespace HealthEngine\Laravel\Extension;

use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosInterface;
use DateTimeInterface;

/**
 * Trait ChronosTimestamps
 * @package HealthEngine\Laravel\Extension;
 *
 * Overrides the Eloquent model timestamps to use Chronos instead of Carbon because they are immutable.
 * @see \Illuminate\Database\Eloquent\Concerns\HasTimestamps for the default implementatino that this trait aims to
 * improve with immutability.
 */
trait ChronosTimestamps
{
    /**
     * Get a fresh timestamp for the model.
     * This method is used by Eloquent internals to generate a new timestamp when casting a column.
     *
     * @return ChronosInterface
     */
    public function freshTimestamp()
    {
        return new Chronos;
    }

    /**
     * Return a timestamp as a Chronos object.
     *
     * @param mixed $value
     * @return ChronosInterface
     * @throws \Exception If an invalid value is parsed that cannot be converted to a Chronos instance
     */
    public function asDateTime($value)
    {
        if ($value instanceof ChronosInterface) {
            return $value;
        }

        // if its datetime interface, convert it
        if ($value instanceof DateTimeInterface) {
            return Chronos::instance($value);
        }

        // if its numeric
        if (is_numeric($value)) {
            return Chronos::createFromTimestamp($value);
        }

        // if all else fails, try let chronos figure it out
        return new Chronos($value);
    }
}
