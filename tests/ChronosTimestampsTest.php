<?php

namespace HealthEngine\LaravelChronos\Tests;

use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosInterface;
use DateTime;
use DateTimeImmutable;
use HealthEngine\LaravelChronos\ChronosTimestamps;
use PHPUnit\Framework\TestCase;

/**
 * @covers ChronosTimestamps
 */
class ChronosTimestampsTest extends TestCase
{
    /**
     * Ensure that the freshTimestamp method returns a Chronos instance
     */
    public function testFreshTimestamp()
    {
        $model = $this->createClass();

        Chronos::setTestNow('now');
        $this->assertInstanceOf(ChronosInterface::class, $model->freshTimestamp());
        $this->assertEquals(Chronos::now(), $model->freshTimestamp());
    }

    /**
     * Ensure that the asDateTime method can create Chronos instances from different types
     * @dataProvider dateValues
     */
    public function testAsDateTime($value, $expected)
    {
        $model = $this->createClass();

        $this->assertInstanceOf(ChronosInterface::class, $model->asDateTime($value));
        $this->assertEquals($expected, $model->asDateTime($value));
    }

    /**
     * Ensure an exception is thrown trying to create a timestamp from an invalid string format
     */
    public function testAsDateTimeException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Failed to parse time string');

        $model = $this->createClass();
        $model->asDateTime('invalid date');
    }

    public function dateValues()
    {
        return [
            'timestamp' => [1545207000, new Chronos('2018-12-19T08:10:00.000000+0000')],
            'chronos instance' => [
                new Chronos('2018-12-19T08:10:00.000000+0000'),
                new Chronos('2018-12-19T08:10:00.000000+0000')
            ],
            'datetime instance' => [
                new DateTime('2018-12-19T08:10:00.000000+0000'),
                new Chronos('2018-12-19T08:10:00.000000+0000')
            ],
            'datetime immutable instance' => [
                new DateTimeImmutable('2018-12-19T08:10:00.000000+0000'),
                new Chronos('2018-12-19T08:10:00.000000+0000')
            ],
            'string' => [
                '2018-12-19T08:10:00.000000+0000',
                new Chronos('2018-12-19T08:10:00.000000+0000')
            ],
        ];
    }

    protected function createClass()
    {
        return new class {
            use ChronosTimestamps;
        };
    }
}
