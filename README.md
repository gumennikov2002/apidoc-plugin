# ApiDoc - Плагин для документирования API.

## Пример использования:
Один из примеров использования плагина:

В вашем плагине в классе Plugin, в методе boot дополните контроллер Gumennikov2002\ApiDoc\Controllers\Docs, присвойте его публичному свойству docs массив содержащий массивы с инструкциями.


Пример кода:
```php
public function boot(): void
    {
        \Gumennikov2002\ApiDoc\Controllers\Docs::extend(function (\Backend\Classes\Controller $controller) {
            $controller->docs = [
                [
                    'title' => 'Получить список постов',
                    'tag' => 'Посты',
                    'url' => 'https://example.com/api/v1/posts',
                    'method' => 'get',
                    'responses' => [
                        [
                            'status_code' => 200,
                            'response' => [
                                'data' => [
                                    [
                                        'id' => 1,
                                        'title' => 'First blog post!',
                                        'description' => 'No description provided...'
                                    ],
                                    [
                                        'id' => 2,
                                        'title' => 'Second blog post!',
                                        'description' => null
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'title' => 'Получить пост по ID',
                    'tag' => 'Посты',
                    'url' => 'https://example.com/api/v1/posts/{id}',
                    'method' => 'get',
                    'params' => [
                        [
                            'title' => 'id',
                            'description' => 'ID поста',
                            'in' => 'path',
                            'required' => true,
                            'example' => 1
                        ]
                    ],
                    'responses' => [
                        [
                            'status_code' => 200,
                            'response' => [
                                'data' => [
                                    'id' => 1,
                                    'title' => 'First blog post!',
                                    'description' => 'No description provided...'
                                ],
                            ]
                        ]
                    ]
                ]
            ];
        });
    }
```
