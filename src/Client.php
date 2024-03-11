<?php

namespace P0n0marev\Ispmanager6;

use P0n0marev\Ispmanager6\Adapters\Ispmanager6AdapterInterface;
use P0n0marev\Ispmanager6\Adapters\XmlAdapter;
use P0n0marev\Ispmanager6\Api\Authenticate;
use P0n0marev\Ispmanager6\Api\Presets;
use P0n0marev\Ispmanager6\Api\Users;
use P0n0marev\Ispmanager6\Exception\Ispmanager6Exception;

class Client
{
    private array $options;
    private ?string $auth = null;
    private Ispmanager6AdapterInterface $adapter;
    private array $log = [];

    public function __construct(array $options = [])
    {
        $this->options = array_replace([
            'lang' => 'ru',
            'adapter' => XmlAdapter::class,
        ], $options);

        foreach (['host', 'username', 'password'] as $requiredOption) {
            if (empty($this->options[$requiredOption])) {
                throw new Ispmanager6Exception(sprintf('The required "%s" option is missing.', $requiredOption));
            }
        }

        $this->adapter = new $this->options['adapter'];
    }

    public function setHost(string $host): void
    {
        $this->options['host'] = $host;
    }

    public function setUsername(string $username): void
    {
        $this->options['login'] = $username;
    }

    public function setPassword(string $password): void
    {
        $this->options['password'] = $password;
    }

    public function authenticate(): void
    {
        $this->auth = (new Authenticate($this))->auth($this->options['username'], $this->options['password']);
    }

    public function getAdapter(string $data): Ispmanager6AdapterInterface
    {
        return $this->adapter->getInstance($data);
    }

    public function getHost(): ?string
    {
        return $this->options['host'];
    }

    public function getAuth(): ?string
    {
        return $this->auth;
    }

    public function getLang(): string
    {
        return $this->options['lang'];
    }

    public function getOut(): string
    {
        return $this->options['out'];
    }

    public function users(): Users
    {
        return new Users($this);
    }

    public function presets(): Presets
    {
        return new Presets($this);
    }

    public function addLog(string $message, array $data): void
    {
        $this->log[] = $message;
        $this->log[] = $data;
    }

    public function getLog(): array
    {
        return $this->log;
    }
}
