<?php

declare(strict_types=1);

namespace P0n0marev\Ispmanager6\Tests;

use P0n0marev\Ispmanager6\Adapters\Ispmanager6AdapterInterface;
use P0n0marev\Ispmanager6\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private array $options = [
        'host'     => 'localhost',
        'username' => 'admin',
        'password' => 'secret'
    ];

    public function testCreateClient(): void
    {
        $client = new Client($this->options);

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(Ispmanager6AdapterInterface::class, $client->getAdapter());
        $this->assertEquals($this->options['host'], $client->getHost());
    }
}
