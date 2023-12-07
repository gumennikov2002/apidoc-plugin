## [ENG] ApiDoc is a plugin for documenting the API.

# ApiDoc is a plugin for documenting the API.

## Installation:
1st option:
```php artisan plugin:install Gumennikov2002.ApiDoc```

2nd option:
Via marketplace

## Document properties:
* **title** (_string_, **required**)
* **tags** (_string[]_) / tag (_string_)
* **url** (_string_, **required**)
* **method** (_string_, **required**)
* **params** (_array_)
* **responses** (_array_)

## Parameter properties:
* **title** (_string_, **required**)
* **description** (_string_)
* **in** (_string_, **required**)
* **required** (_boolean_, **required**)
* **example** (_mixed_, **required**)

## Response properties:
* **status_code** (_int_, **required**)
* **response** (_array_, **required**)

## Usage example:

In your plugin in the Plugin class, in the boot method, add the Gumennikov2002\ApiDoc\Controllers\Docs controller, assign its public docs property an array containing arrays with instructions.

Code example:
```php
public function boot(): void
    {
        \Gumennikov2002\ApiDoc\Controllers\Docs::extend(function (\Backend\Classes\Controller $controller) {
            $controller->docs = [
                [
                    'title' => 'Get posts',
                    'tag' => 'Pосты',
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
                    'title' => 'Get post by ID',
                    'tag' => 'Posts',
                    'url' => 'https://example.com/api/v1/posts/{id}',
                    'method' => 'get',
                    'params' => [
                        [
                            'title' => 'id',
                            'description' => 'Post ID',
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

# [RUS] ApiDoc - Плагин для документирования API.

## Установка:
Вариант 1:
```php artisan plugin:install Gumennikov2002.ApiDoc```

Вариант 2:
Через маркетплейс

## Свойства документа:
* **title** (Заголовок, _string_, **обязательный**)
* **tags** (Теги, _string[]_) / tag (Тег, _string_)
* **url** (_string_, **обязательный**)
* **method** (Метод, _string_, **обязательный**)
* **params** (Параметры, _array_)
* **responses** (Ответы, _array_)

## Свойства параметра:
* **title** (Заголовок, _string_, **обязательный**)
* **description** (Описание, _string_)
* **in** (_string_, **обязательный**)
* **required** (Обязательный?, _boolean_, **обязательный**)
* **example** (Пример, _mixed_, **обязательный**)

## Свойства ответа:
* **status_code** (Код ответа, _int_, **обязательный**)
* **response** (Данные ответа, _array_, **обязательный**)


## Пример использования:
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
