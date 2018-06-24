<?php

namespace Vk\Parameters\Likes;

/**
 * @see https://vk.com/dev/likes.getList
 */
class GetList
{
    public const MAX_COUNT_WHEH_FRIENDS_ALL = 1000;
    public const MAX_COUNT_WHEH_FRIENDS_ONLY = 100;

    /**
     * Запись на стене пользователя или группы;
     */
    public const TYPE_POST = 'post';

    /**
     * Устанавливает вернуть  информацию обо всех пользователях;
     */
    public const FILTER_LIKES = 'likes';

    /**
     * Устанавливает вернуть информацию только о пользователях, рассказавших об объекте друзьям
     */
    public const FILTER_COPIES = 'copies ';

    public const FRIENDS_ALL = 0;
    public const FRIENDS_ONLY = 1;

    /**
     * @var string
     */
    private $type = self::TYPE_POST;

    /**
     * @var int|null
     */
    private $ownerId = null;

    /**
     * @var int|null
     */
    private $itemId = null;

    /**
     * @var string|null
     */
    private $pageUrl = null;

    /**
     * Указывает, следует ли вернуть всех пользователей, добавивших объект в список "Мне нравится"
     * или только тех, которые рассказали о нем друзьям. Параметр может принимать следующие значения:
     *
     * @var string
     */
    private $filter = self::FILTER_LIKES;

    /**
     * Указывает, необходимо ли возвращать только пользователей, которые являются друзьями текущего пользователя.
     * Параметр может принимать следующие значения:
     *
     * @var int
     */
    private $friendsOnly = self::FRIENDS_ALL;

    /**
     * @var bool
     */
    private $extended = true;

    /**
     * @var int
     */
    private $offset = 0;

    /**
     * @var int
     */
    private $count = 100;

    /**
     * @var bool
     */
    private $skipOwn = false;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    /**
     * @param int|null $ownerId
     */
    public function setOwnerId(?int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return int|null
     */
    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    /**
     * @param int|null $itemId
     */
    public function setItemId(?int $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * @return null|string
     */
    public function getPageUrl(): ?string
    {
        return $this->pageUrl;
    }

    /**
     * @param null|string $pageUrl
     */
    public function setPageUrl(?string $pageUrl): void
    {
        $this->pageUrl = $pageUrl;
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
     * @return int
     */
    public function getFriendsOnly(): int
    {
        return $this->friendsOnly;
    }

    /**
     * @param int $friendsOnly
     *
     * @throws
     */
    public function setFriendsOnly(int $friendsOnly): void
    {
        if ($friendsOnly === self::FRIENDS_ALL && $this->count > self::MAX_COUNT_WHEH_FRIENDS_ALL) {
            $msg = sprintf(
                'Wrong count. Max count = %s when friendsOnly = %s',
                self::MAX_COUNT_WHEH_FRIENDS_ALL,
                self::FRIENDS_ALL
            );
            throw new \Exception($msg);
        } elseif ($friendsOnly === self::FRIENDS_ONLY && $this->count > self::MAX_COUNT_WHEH_FRIENDS_ONLY){
            $msg = sprintf(
                'Wrong count. Max count = %s when friendsOnly = %s',
                self::MAX_COUNT_WHEH_FRIENDS_ONLY,
                self::FRIENDS_ONLY
            );
            throw new \Exception($msg);
        }

        $this->friendsOnly = $friendsOnly;
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
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset(int $offset): void
    {
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
        if ($this->friendsOnly === self::FRIENDS_ALL && $count > self::MAX_COUNT_WHEH_FRIENDS_ALL) {
            $msg = sprintf(
                'Wrong count. Max count = %s when friendsOnly = %s',
                self::MAX_COUNT_WHEH_FRIENDS_ALL,
                self::FRIENDS_ALL
            );
            throw new \Exception($msg);
        } elseif ($this->friendsOnly === self::FRIENDS_ONLY && $count > self::MAX_COUNT_WHEH_FRIENDS_ONLY){
            $msg = sprintf(
                'Wrong count. Max count = %s when friendsOnly = %s',
                self::MAX_COUNT_WHEH_FRIENDS_ONLY,
                self::FRIENDS_ONLY
            );
            throw new \Exception($msg);
        }

        if ($count < 0) {
            throw new \Exception('Wrong count. Count is ' . $count);
        }

        $this->count = $count;
    }

    /**
     * @return bool
     */
    public function isSkipOwn(): bool
    {
        return $this->skipOwn;
    }

    /**
     * @param bool $skipOwn
     */
    public function setSkipOwn(bool $skipOwn): void
    {
        $this->skipOwn = $skipOwn;
    }


}