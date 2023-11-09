<?php

namespace Gumennikov2002\ApiDoc\Classes\Constructors;

use Gumennikov2002\ApiDoc\Classes\Interfaces\ConstructorInterface;

/**
 * Parameter constructor
 */
class ParameterConstructor implements ConstructorInterface
{
    /**
     * @var string title
     */
    protected string $title;

    /**
     * @var string|null description
     */
    protected ?string $description = null;

    /**
     * @var string in (path/query)
     */
    protected string $in;

    /**
     * @var mixed value example
     */
    protected mixed $example;

    /**
     * @var bool required
     */
    protected bool $required;

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
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set in
     *
     * @param string $in
     *
     * @return $this
     */
    public function setIn(string $in): self
    {
        $this->in = $in;

        return $this;
    }

    /**
     * Set value example
     *
     * @param mixed $example
     *
     * @return $this
     */
    public function setExample(mixed $example): self
    {
        $this->example = $example;

        return $this;
    }

    /**
     * Set required
     *
     * @param bool $required
     *
     * @return $this
     */
    public function setRequired(bool $required = true): self
    {
        $this->required = $required;

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
            'title' => $this->title,
            'description' => $this->description,
            'in' => $this->in,
            'example' => $this->example,
            'required' => $this->required
        ];
    }
}
