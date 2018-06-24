<?php

namespace Vk\Parameters\Wall;

/**
 * @see https://vk.com/dev/wall.get
 */
class Get
{
    public const COUNT_MAX = 100;

    public const FILTER_SUGGESTS = 'suggests';
    public const FILTER_POSTPONED = 'postponed';
    public const FILTER_OWNER = 'owner';
    public const FILTER_OTHERS = 'others';
    public const FILTER_ALL = 'all';

    /**
     * @var int|null
     */
    private $ownerId = null;

    /**
     * @var string
     */
    private $domain = '';

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $count = self::COUNT_MAX;

    /**
     * @var string
     */
    private $filter = self::FILTER_ALL;

    /**
     * @var bool
     */
    private $extended = false;

    /**
     * @var string
     */
    private $fields = '';

    /**
     * @return int|null
     */
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     */
    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @throws
     */
    public function setOffset(int $offset): void
    {
        if ($offset < 0) {
            throw new \Exception('wrong offset value');
        }

        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @throws
     */
    public function setCount(int $count): void
    {
        if ($count < 0) {
            throw new \Exception('wrong count value');
        }

        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getFilter(): string
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     */
    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @return bool
     */
    public function isExtended(): bool
    {
        return $this->extended;
    }

    /**
     * @param bool $extended
     */
    public function setExtended(bool $extended): void
    {
        $this->extended = $extended;
    }

    /**
     * @return string
     */
    public function getFields(): string
    {
        return $this->fields;
    }

    /**
     * @param string $fields
     */
    public function setFields(string $fields): void
    {
        $this->fields = $fields;
    }
}
