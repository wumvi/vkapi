<?php
declare(strict_types=1);

namespace Vk\Result\AppWidgets;

class Upload
{
    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $image;

    public function __construct(\stdClass $raw)
    {
        $this->hash = $raw->hash;
        $this->image = $raw->image;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }
}
