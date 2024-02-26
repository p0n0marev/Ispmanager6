<?php

namespace P0n0marev\Ispmanager6\Api;

use P0n0marev\Ispmanager6\Adapters\Ispmanager6AdapterInterface;
use P0n0marev\Ispmanager6\Client as Ispmanager6Client;
use P0n0marev\Ispmanager6\Exception\Ispmanager6Exception;

class AbstractApi
{
    private const URI_PREFIX = '/ispmgr';
    protected Ispmanager6Client $client;
    protected Ispmanager6AdapterInterface $adapter;

    public function __construct(Ispmanager6Client $client)
    {
        $this->client = $client;
    }

    protected function request(string $func, array $params = []): void
    {
        $query = [
            'func' => $func,
            'lang' => $this->client->getLang(),
            'out'  => 'xml',
        ];
        $query = array_merge($query, $params);

        $this->client->addLog('request', $query);

        if (!empty($this->client->getAuth())) {
            $query['auth'] = $this->client->getAuth();
        }

        $url = sprintf('%s%s?%s', $this->client->getHost(), self::URI_PREFIX, http_build_query($query));

        $response = file_get_contents($url);

        $this->adapter = $this->client->getAdapter($response);

        $data = $this->adapter->getData();

        $this->client->addLog('response', $data);

        if (!empty($data['error'])) {
            throw new Ispmanager6Exception($this->adapter->getError());
        }
    }
}