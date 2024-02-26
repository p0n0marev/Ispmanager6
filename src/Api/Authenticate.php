<?php

namespace P0n0marev\Ispmanager6\Api;

class Authenticate extends AbstractApi
{
    public function auth(string $username, string $password): string
    {
        $this->request('auth', compact('username', 'password'));

        $data = $this->adapter->getData();

        return $data['auth'];
    }
}
