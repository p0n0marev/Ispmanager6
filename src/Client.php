<?php


namespace P0n0marev\Ispmanager6;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Client
{

    private ClientInterface $httpClient;
    private array $options;
    private string $auth;

    public function __construct(ClientInterface $httpClient, array $options = [])
    {
        $this->httpClient = $httpClient;

        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['host', 'username', 'password']);
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
        $pattern = '<host>/ispmgr?out=xml&func=auth&username=<username>&password=<password>';
        $url = strtr($pattern, [
            '<host>'     => $this->options['host'],
            '<username>' => $this->options['username'],
            '<password>' => $this->options['password'],
        ]);
        $xml = file_get_contents($url);
        $rs = simplexml_load_string($xml);
        $this->auth = (string)$rs->auth;
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function getAuth(): string
    {
        return $this->auth;
    }
}
