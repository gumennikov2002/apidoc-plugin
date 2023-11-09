<?php

namespace Gumennikov2002\ApiDoc\Classes\Constructors;

use Gumennikov2002\ApiDoc\Classes\Interfaces\ConstructorInterface;

/**
 * Response constructor
 */
class ResponseConstructor implements ConstructorInterface
{
    /**
     * @var int status code
     */
    protected int $statusCode = 200;

    /**
     * @var array response data
     */
    protected array $response;

    /**
     * Set status code
     *
     * @param int $statusCode
     *
     * @return $this
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Set response
     *
     * @param array $response
     *
     * @return $this
     */
    public function setResponse(array $response): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get results
     *
     * @return array
     */
    public function getResult(): array
    {
        return [
            'status_code' => $this->statusCode,
            'response' => $this->response
        ];
    }
}
