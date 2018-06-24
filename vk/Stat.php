<?php

namespace Vk;

class Stat extends Exec
{

    /**
     * @param int $ownerId
     * @param string[] $fields
     *
     * @return array
     *
     * @throws
     *
     * @see https://vk.com/dev/stats.get
     */
    public function get(): ?array
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
        $json = $this->request('stats.get', $param);

        var_dump($json);

        return [];
    }
}