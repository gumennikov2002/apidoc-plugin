# ApiDoc - Плагин для документирования API.

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

_см. Gumennikov2002\ApiDoc\Classes\Constructors\DocumentConstructor_

## Свойства параметра:
* **title** (Заголовок, _string_, **обязательный**)
* **description** (Описание, _string_)
* **in** (_string_, **обязательный**)
* **required** (Обязательный?, _boolean_, **обязательный**)
* **example** (Пример, _mixed_, **обязательный**)

_см. Gumennikov2002\ApiDoc\Classes\Constructors\ParameterConstructor_

## Свойства ответа:
* **status_code** (Код ответа, _int_, **обязательный**)
* **response** (Данные ответа, _array_, **обязательный**)

_см. Gumennikov2002\ApiDoc\Classes\Constructors\ResponseConstructor_


## Пример использования (через массив):
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

## Пример использования (через конструкторы):
Пример кода:

```php
public function boot(): void
{
    \Gumennikov2002\ApiDoc\Controllers\Docs::extend(function (\Backend\Classes\Controller $controller) {
        # Common documents pool
        $documentPool = new Pool;

        # DOCUMENT 1: All posts
        $allPostsDocument = (new DocumentConstructor)
            ->setTitle('Получить список постов')
            ->setTags(['Посты'])
            ->setUrl('https://example.com/api/v1/posts')
            ->setMethod('get');
        $allPostsResponsesPool = new Pool;
        $allPostsOkResponse = (new ResponseConstructor)->setResponse(
            [
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
        );
        $allPostsResponsesPool->add($allPostsOkResponse);
        $allPostsDocument->setResponsesPool($allPostsResponsesPool);

        # DOCUMENT 2: Post by id
        $postByIdDocument = (new DocumentConstructor)
            ->setTitle('Получить пост по ID')
            ->setTag('Посты')
            ->setUrl('https://example.com/api/v1/posts/{id}')
            ->setMethod('get');
        $postByIdDocumentParamsPool = new Pool;
        $postByIdDocumentParamId = (new ParameterConstructor)->setTitle('id')
            ->setDescription('ID поста')
            ->setRequired()
            ->setIn('path')
            ->setExample(1);
        $postByIdDocumentParamsPool->add($postByIdDocumentParamId);
        $postByIdDocumentResponsesPool = new Pool;
        $postByIdDocumentResponseOk = (new ResponseConstructor)->setResponse([
            'data' => [
                'id' => 1,
                'title' => 'First blog post!',
                'description' => 'No description provided...'
            ],
        ]);
        $postByIdDocumentResponsesPool->add($postByIdDocumentResponseOk);
        $postByIdDocument->setParametersPool($postByIdDocumentParamsPool)
            ->setResponsesPool($postByIdDocumentResponsesPool);


        $documentPool->addMultiple(
            $allPostsDocument,
            $postByIdDocument
        );

        $controller->docs = $documentPool->get();
    });
}
```
