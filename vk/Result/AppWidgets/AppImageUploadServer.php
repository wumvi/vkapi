<?php
declare(strict_types=1);

namespace Vk\Result\AppWidgets;

class AppImageUploadServer
{
    /**
     * @var string
     */
    private $uploadUrl;

    /**
     * AppImageUploadServer constructor
     *
     * @param \stdClass $raw
     */
    public function __construct(\stdClass $raw)
    {
        $this->uploadUrl = $raw->upload_url;
    }

    /**
     * @return string
     */
    public function getUploadUrl(): string
    {
        return $this->uploadUrl;
    }
}
