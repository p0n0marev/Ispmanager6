<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Client as Ispmanager6Client;
use P0n0marev\Ispmanager6\Exception\Ispmanager6Exception;
use P0n0marev\Ispmanager6\Message\ResponseMediator;

class AbstractApi
{
    private const URI_PREFIX = '/ispmgr';
    protected Ispmanager6Client $client;

    public function __construct(Ispmanager6Client $client)
    {
        $this->client = $client;
    }

    protected function request(string $func, array $params = []): array
    {
        $query = [
            'func' => $func,
            'lang' => $this->client->getLang(),
            'out'  => 'xml',
        ];
        if (!empty($this->client->getAuth())) {
            $query['auth'] = $this->client->getAuth();
        }

        $query = array_merge($query, $params);

        $url = sprintf('%s%s?%s', $this->client->getHost(), self::URI_PREFIX, http_build_query($query));

        $response = file_get_contents($url);
        $data = $this->client->getAdapter()->getData($response);

        if (!empty($data['error'])) {
            throw new Ispmanager6Exception(ResponseMediator::getError($data));
        }

        return $data;
    }
}