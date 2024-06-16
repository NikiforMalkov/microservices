<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExampleRequest;
use App\Services\RedisService;
use Dizi\DateHelperCommon\DTO\Example\ExampleData;

class ExampleApiController extends Controller
{

    //TODO: add swagger
    public function test(CreateExampleRequest $request, RedisService $redis) {
        $data = $request->safe()->toArray();
        $example = ExampleData::fromArray($data);
        $redis->publishExampleCreated($example);
    }
}
