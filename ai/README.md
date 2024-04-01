# Этот микросервис для работы с ИИ

## REST 

Нужно создать ендпоинт, который на вход будет получать какой-то промпт/запрос пользователя, добавляет его в очередь на обработку

## CONSOLE 

Нужно создать консольную команду, при её вызове она получает все необработанные сообщения из очереди и выполняет обработчик для события. Важно учесть, что у апи есть ограничения по количеству запросов

В данном случае происходит запрос к api gemini, через Illuminate\Support\Facades\Http

### Ключ для gemini можно создать вот тут:

https://aistudio.google.com/app/apikey

### Пример запроса curl-командой
```
curl \
  -H 'Content-Type: application/json' \
  -d '{"contents":[{"parts":[{"text":"Write a story about a magic backpack"}]}]}' \
  -X POST 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=YOUR_API_KEY'
```

### Документация по Illuminate\Support\Facades\Http

https://laravel.com/docs/11.x/http-client