<?php

namespace Vk\Exception;

use Throwable;

class Internal extends Common
{
    /**
     * @var \stdClass
     */
    private $rawData;

    public function __construct(\stdClass $raw, string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->rawData = $raw;
    }

    /**
     * @return \stdClass
     */
    public function getRawData(): \stdClass
    {
        return $this->rawData;
    }
}