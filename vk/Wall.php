<?php

namespace Vk;

use Vk\Parameters\Wall\Get;

class Wall extends Exec
{

    /**
     * Возвращает список записей со стены пользователя или сообщества.
     *
     * @param Get $get
     *
     * @return array|null
     *
     * @throws
     *
     * @see https://vk.com/dev/wall.get
     */
    public function get(Get $get): ?\stdClass
    {
        if (!$get->getOwnerId()) {
            throw new \Exception('Wrong owner id');
        }

        $param = [
            'owner_id' => $get->getOwnerId(),
            'offset' => $get->getOffset(),
            'count' => $get->getCount(),
            'extended' => $get->isExtended() ? 1 : 0,
            'fields' => $get->getFields(),
            'filter' => $get->getFields(),
        ];

        if ($get->getDomain()) {
            $param += ['domain' => $get->getDomain()];
        }

        try {
            $json = $this->request('wall.get', $param);
        } catch (\Exception $ex) {
            return null;
        }

        return $json;
    }

    /**
     * @param int[] $ids
     *
     * @return []
     *
     * @see https://vk.com/dev/wall.getById
     * @see https://vk.com/dev/objects/group
     */
    public function getById(array $ids)
    {
        $param = [
            'posts' => implode(',', $ids),
            'extended' => 1,
            // 'fields' => $fields,
        ];
        try {
            $json = $this->request('wall.getById', $param);
        } catch (\Exception $ex) {

            var_dump($ex);
            return null;
        }

        var_dump($json);

        return [];
    }
}