<?php
declare(strict_types=1);

namespace Vk\Result\AppWidgets;

class SaveAppImage
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Image[]
     */
    private $images = [];

    public function __construct(\stdClass $raw)
    {
        $this->id = $raw->id;
        $this->type = $raw->type;
        foreach($raw->images as $image) {
            $this->images[] = new Image($image);
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }
}
