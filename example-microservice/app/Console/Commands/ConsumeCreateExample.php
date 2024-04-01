<?php

namespace App\Console\Commands;

use App\Actions\ConsumeExampleAction;
use App\Services\RedisService;
use Dizi\DateHelperCommon\DTO\Example\ExampleData;
use Dizi\DateHelperCommon\Enums\Events;
use Illuminate\Console\Command;

class ConsumeCreateExample extends Command
{
    protected $signature = 'app:consume-create-example';
    protected $description = 'Command description';

    public function handle(
        RedisService $redis,
        ConsumeExampleAction $consumeExample,
    )
    {
        foreach ($redis->consumeEvents() as $event) {
            match ($event['type']) {
                Events::EXAMPLE_CREATED =>
                    $consumeExample->execute(
                        ExampleData::fromArray($event['data'])
                    ),
                default => null
            };

            $redis->addProcessedEvent($event);
        }
    }
}
