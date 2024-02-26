<?php

namespace P0n0marev\Ispmanager6\Adapters;

use P0n0marev\Ispmanager6\Entities\BaseEntity;

final class XmlAdapter implements Ispmanager6AdapterInterface
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getInstance(string $data): Ispmanager6AdapterInterface
    {
        $xml = new \SimpleXMLElement($data);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        foreach (['passwd', 'confirm'] as $name) {
            $array[$name] = null;
        }

        return new self($array);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getElement(string $entityName): BaseEntity
    {
        return new $entityName($this->data);
    }

    public function getList(string $entityName): array
    {
        $result = [];

        foreach ($this->data['elem'] as $element) {
            $result[] = new $entityName($element);
        }

        return $result;
    }

    public function isSuccess(): bool
    {
        return isset($this->data['ok']);
    }

    public function getError(): string
    {
        return $this->data['error']['msg'];
    }
}