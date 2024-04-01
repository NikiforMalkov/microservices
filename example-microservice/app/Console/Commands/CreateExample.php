<?php

namespace App\Console\Commands;

use App\Services\RedisService;
use Dizi\DateHelperCommon\DTO\Example\ExampleData;
use Illuminate\Console\Command;

class CreateExample extends Command
{

    protected $signature = 'app:create-example';
    protected $description = 'Command description';

    public function handle(
        RedisService $redis
    )
    {
        $example = new ExampleData(
            'test name',
            'test description'
        );

        $redis->publishExampleCreated($example);
    }
}
