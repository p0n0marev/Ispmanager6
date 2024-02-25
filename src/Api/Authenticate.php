<?php

namespace P0n0marev\Ispmanager6\Api;

class Authenticate extends AbstractApi
{
    public function auth(string $username, string $password): string
    {
        $rs = $this->request('auth', compact('username', 'password'));

        return $rs['auth'];
    }
}
