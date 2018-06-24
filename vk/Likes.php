<?php

namespace Vk;

use Vk\Parameters\Likes\GetList;

class Likes extends Exec
{
    /**
     * @param GetList $param
     *
     * @return array
     *
     * @throws
     *
     * @see https://vk.com/dev/likes.getList
     */
    public function getList(GetList $param): array
    {
        if ($param->getOwnerId() === null) {
            throw new \Exception('Wrong OwnerId');
        }

        if (!$param->getItemId() === null) {
            throw new \Exception('Wrong ItemId');
        }

        $data = [
            'type' => $param->getType(),
            'owner_id' => $param->getOwnerId(),
            'item_id' => $param->getItemId(),
            'friends_only' => $param->getFriendsOnly(),
            'filter' => $param->getFilter(),
            'extended' => (int)$param->isExtended(),
            'offset' => $param->getOffset(),
            'count' => $param->getCount(),
            'skip_own' => (int)$param->isSkipOwn(),
        ];

        $data += $param->getPageUrl() ? ['page_url' => $param->getPageUrl()] : [];

        $json = $this->request('likes.getList', $data);

        var_dump($json->items[0]);
    }
}