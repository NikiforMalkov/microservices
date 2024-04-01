<?php

namespace App\Actions;

use Dizi\DateHelperCommon\DTO\Example\ExampleData;
use Illuminate\Support\Facades\Log;

class ConsumeExampleAction
{
    public function execute(ExampleData $data)
    {
        //TODO: тут уже обрабатываем собитие создания
        // тут может быть валидация, бизнес-логика и прочее
        Log::info('Create example action: ' . json_encode($data));
    }
}
