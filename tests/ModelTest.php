<?php

declare(strict_types=1);

namespace HealthEngine\LaravelChronos\Tests;

use Cake\Chronos\Chronos;
use HealthEngine\LaravelChronos\ChronosTimestamps;
use Illuminate\Database\Eloquent\Model;
use Orchestra\Testbench\TestCase;

/**
 * @covers ChronosTimestamps
 */
class ModelTest extends TestCase
{
    public function testItWorksWithRealModels(): void
    {
        $testedAt = Chronos::parse('2024-10-14 14:22');
        $now = Chronos::parse('2025-11-15 15:23');

        Chronos::setTestNow($now);

        $model = new class () extends Model {
            use ChronosTimestamps;

            protected $casts = [
                'tested_at' => 'datetime',
            ];

            protected $table = 'models';
        };
        $model->setAttribute('tested_at', $testedAt);
        $model->save();

        /** @var Model $freshModel */
        $freshModel = $model::query()->get()->firstOrFail();

        $this->assertEquals($now, $freshModel->getAttribute('created_at'));
        $this->assertEquals($testedAt, $freshModel->getAttribute('tested_at'));
        $this->assertEquals($now, $freshModel->getAttribute('updated_at'));
    }

    public function testItThrowsErrorWhenCastAsImmutable(): void
    {
        $testedAt = Chronos::parse('2023-09-13 13:49');

        $model = new class () extends Model {
            use ChronosTimestamps;

            protected $casts = [
                'tested_at' => 'immutable_datetime',
            ];

            protected $table = 'models';
        };
        $model->setAttribute('tested_at', $testedAt);
        $model->save();

        /** @var Model $freshModel */
        $freshModel = $model::query()->get()->firstOrFail();

        $this->expectExceptionMessage('Call to undefined method Cake\Chronos\Chronos::toImmutable()');

        $freshModel->getAttribute('tested_at');
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../workbench/database/migrations');
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
    }
}
