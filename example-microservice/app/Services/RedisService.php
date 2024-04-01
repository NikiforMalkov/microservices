<?php

namespace App\Services;

use Dizi\DateHelperCommon\DTO\Example\ExampleData;
use Dizi\DateHelperCommon\Events\Example\ExampleCreatedEvent;
use Dizi\DateHelperCommon\Services\RedisService as BaseRedisService;

class RedisService extends BaseRedisService
{
    public function getServiceName(): string
    {
        return 'example';
    }

    public function publishExampleCreated(ExampleData $data): void
    {
        $this->publish(new ExampleCreatedEvent($data));
    }

}
