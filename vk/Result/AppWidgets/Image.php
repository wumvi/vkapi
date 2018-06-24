<?php
declare(strict_types=1);

namespace Vk\Result\AppWidgets;

class Image
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    public function __construct(\stdClass $raw)
    {
        $this->url = $raw->url;
        $this->width = $raw->width;
        $this->height = $raw->height;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
}
