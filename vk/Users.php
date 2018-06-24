<?php

namespace Vk;

use Vk\Result\User;

class Users extends Exec
{
    /**
     * @param int[] $userIds
     * @param string[] $fields
     *
     * @return array
     *
     * @throws
     *
     * @see https://vk.com/dev/users.get
     * @see https://vk.com/dev/objects/user_1
     * @see https://vk.com/dev/objects/user_2
     */
    public function get(array $userIds, array $fields = []): array
    {
        $param = ['user_ids' => implode(',', $userIds), 'fields' => $fields,];
        $list = $this->request('users.get', $param);

        return array_map(function($json) {
            return new User($json);
        }, $list);
    }

    /**
     * @see https://vk.com/dev/users.getSubscriptions
     */
    public function getSubscriptions() {

    }

    public function search(): ?array
    {
        $param = [
            // 'q' => 'Анна Мельникова',
            'hometown' => 'Кара-Суу',
            //'status' => 1,
            'sex' => 1,
            'birth_day' => 17,
            'birth_month' => 8,
            //'birth_year' => 1986
        ];
        $json = $this->request('users.search', $param);

        var_dump($json);

        return [];
    }
}