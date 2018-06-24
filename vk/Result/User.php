<?php

namespace Vk\Result;

class User
{
    const SEX_BOY = 2;
    const SEX_GIRL = 1;
    const SEX_NONE = 0;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $deactivated;

    /**
     * @var bool
     */
    private $banned;

    /**
     * @var int
     */
    private $sex;

    /**
     * @var string
     */
    private $birthDate;

    public function __construct(\stdClass $json)
    {
        $this->id = $json->id;
        $this->firstName = $json->first_name;
        $this->lastName = $json->last_name;
        $this->deactivated = ($json->deactivated ?? '') === 'deleted';
        $this->banned = ($json->deactivated ?? '') === 'banned';
        $this->birthDate = $json->bdate ?? '';
        $this->sex = $json->sex ?? self::SEX_NONE;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isDeactivated(): bool
    {
        return $this->deactivated;
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->banned;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }
}
