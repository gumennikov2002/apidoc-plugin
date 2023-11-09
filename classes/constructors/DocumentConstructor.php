<?php

namespace Gumennikov2002\ApiDoc\Classes\Constructors;

use Gumennikov2002\ApiDoc\Classes\Interfaces\ConstructorInterface;
use Gumennikov2002\ApiDoc\Classes\Pools\Pool;

/**
 * Document constructor
 */
class DocumentConstructor implements ConstructorInterface
{
    /**
     * @var string title of the document
     */
    protected string $title;

    /**
     * @var string[]|null tags
     */
    protected ?array $tags = null;

    /**
     * @var string|null tag
     */
    protected ?string $tag = null;

    /**
     * @var string url
     */
    protected string $url;

    /**
     * @var string method
     */
    protected string $method;

    /**
     * @var array|null parameters
     */
    protected ?array $parameters = null;

    /**
     * @var array|null responses
     */
    protected ?array $responses = null;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set tags
     *
     * @param array $tags
     *
     * @return $this
     */
    public function setTags(array $tags): self
    {
        $this->tag = null;
        $this->tags = $tags;

        return $this;
    }

    /**
     * Add tag to the tags list
     *
     * @param string $tag
     *
     * @return $this
     */
    public function addTag(string $tag): self
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag from tags list
     *
     * @param string $tag
     *
     * @return $this
     */
    public function removeTag(string $tag): self
    {
        if (!$this->tags && empty($this->tags)) {
            return $this;
        }

        $tagKey = array_search($tag, $this->tags);

        if (!$tagKey) {
            return $this;
        }

        unset($this->tags[$tagKey]);

        return $this;
    }

    /**
     * Set only one tag
     *
     * @param string $tag
     *
     * @return $this
     */
    public function setTag(string $tag): self
    {
        $this->tags = null;
        $this->tag = $tag;

        return $this;
    }

    /**
     * Set URL
     *
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Set raw array of parameters
     *
     * @param array $parameters
     *
     * @return self
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = [];
    }

    /**
     * Set pool of parameters
     *
     * @param Pool $pool
     *
     * @return $this
     */
    public function setParametersPool(Pool $pool): self
    {
        $this->parameters = $pool->get();

        return $this;
    }

    /**
     * Set raw array of responses
     *
     * @param array $responses
     *
     * @return $this
     */
    public function setResponses(array $responses): self
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Set pool of responses
     *
     * @param Pool $pool
     *
     * @return $this
     */
    public function setResponsesPool(Pool $pool): self
    {
        $this->responses = $pool->get();

        return $this;
    }

    /**
     * Get result array
     *
     * @return array
     */
    public function getResult(): array
    {
        $tags = $this->tag
            ? ['tag' => $this-> tag]
            : ['tags' => $this->tags];

        return array_merge([
            'title' => $this->title,
            'url' => $this->url,
            'method' => $this->method,
            'params' => $this->parameters,
            'responses' => $this->responses
        ], $tags);
    }
}
