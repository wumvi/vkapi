<?php
declare(strict_types=1);

namespace Vk\Parameters\AppWidgets;


class AppImageUploadServer
{
    public const IMAGE_TYPE_S24 = '24x24';
    public const IMAGE_TYPE_S50 = '50x50';
    public const IMAGE_TYPE_S160 = '160x160';
    public const IMAGE_TYPE_160_240 = '160x240';
    public const IMAGE_TYPE_510_128 = '510x128';

    private $imageType = self::IMAGE_TYPE_S24;

    /**
     * @return string
     */
    public function getImageType(): string
    {
        return $this->imageType;
    }

    /**
     * @param string $imageType
     */
    public function setImageType(string $imageType): void
    {
        $this->imageType = $imageType;
    }
}
