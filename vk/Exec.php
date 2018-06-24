<?php

namespace Vk;

use LightweightCurl\Curl;
use LightweightCurl\Request;
use LightweightCurl\Result;
use Vk\Exception\Internal;
use Vk\Exception\Users as UsersException;

class Exec
{
    public const API_URL = 'https://api.vk.com/method/';
    public const VERSION = '5.52';

    private $curl;
    private $token;

    public function __construct(string $token, ?Curl $curl = null)
    {
        $this->curl = $curl ?? new Curl();
        $this->token = $token;
    }

    /**
     * @param string $acton
     * @param array $param
     *
     * @return \stdClass|array
     *
     * @throws
     */
    protected function request(string $acton, array $param = [])
    {
        $request = new Request();
        $query = http_build_query($param + ['v' => self::VERSION, 'access_token' => $this->token]);
        $request->setUrl(self::API_URL . $acton . '?' . $query);

        $response = $this->curl->call($request);

        if ($response->getHttpCode() !== 200) {
            $msg = sprintf('Wrong answer. Code %s', $response->getHttpCode());
            throw new UsersException($msg);
        }

        $json = json_decode($response->getData());
        if (!$json) {
            $msg = sprintf('Wrong json. Raw data: %s', $response->getData());
            throw new UsersException($msg);
        }

        if (isset($json->error)) {
            $msg = sprintf('Error: %s', $json->error->error_msg);
            throw new Internal($json->error, $msg);
        }

        return $json->response;
    }
}
